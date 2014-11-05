<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @copyright 2014 Monique Hahnefeld
 */

namespace MHAHNEFELD\FTC;


class ftcPresetsModel extends \Model
{

    protected static $strTable = 'tl_ftc_presets';
    
    
    public $defaultPreset = false;
    
    public $strTableKey;//substr(\Input::get('table'), 3, (strlen(\Input::get('table')))-3;
    
    // get key for table and/or class arrays
    protected function getKey()
     {    
	     if(\Input::get('table')===NULL){
	     	 $this->strTableKey = \Input::get('do');
	     
	     }else{
	    	 $this->strTableKey = substr(\Input::get('table'), 3, (strlen(\Input::get('table')))-3);

	     }
     	return $this->strTableKey;  
    }
     
    // get name of method from key 
    public function getStrClass()
     {  
      $key = $this->getKey();
      
       if($key=='form_field') {
        $strClass = 'FormFieldModel';
       }else {
        $strClass = strtoupper(substr($key, 0, 1)).substr($key, 1, (strlen($key)-1)).'Model'; 
       }
       return $strClass;
     } 

     // get fields in backend sections like article, content, .. which use presets
    protected function getFields()
     {  
      $key = $this->getKey();
      $FieldsArr = $GLOBALS['TL_DCA']['tl_'.$key]['fields'];
      $DiffStr = 'ftc_preset_id';
      //search all presetfields
      //attention to the name of the combined field (ftc_preset_full+chain)
      $PresetFieldsArr = preg_grep( "/$DiffStr/i", array_keys($FieldsArr));
      $IdFullPairArr=array();
      $i = 0;
      foreach ($PresetFieldsArr as $field) {
        $IdFullPairArr[$i]['id'] = $field;
        $IdFullPairArr[$i]['combined'] = 'ftc_preset_full'.substr($field,  strlen($DiffStr), strlen($field)-strlen($DiffStr));
        $i++;
      }
       return $IdFullPairArr;
     }

     //filter pairs which id is set
      protected function getFieldsForUpdate($activeRecord)
     {  
      $IdFullPairArr = $this->getFields();
      foreach ($IdFullPairArr as $k=>$field) {
       // var_dump($IdFullPairArr[$k],$activeRecord->$field['id']);
        if($activeRecord->$field['id']=='-'){
           unset($IdFullPairArr[$k]);
        }else{
           continue;
        }
      }

       return $IdFullPairArr;
      }

    //get grid value and generate options
    public function getPresets()
     {
    
       $objModel = (ftcPresetsModel::findAll()===NULL)?array():ftcPresetsModel::findAll()->fetchAll();
       $Presets = $objModel;
       $optionsArr = array();
       
       $optionsArr['-'] = '-';
        $i = 1; 
	     foreach ($Presets as $preset) {//&&\Input::get('act')=='edit'
		     if(in_array($this->getKey(),unserialize($preset['show_in_sections']))){
		    	$optionsArr[$preset['id']]= $preset['name'];
		 		$i++;
		     }
	      }

     return $optionsArr;
     	
     }
     
     //get align value and generate options
     public function getSelectedPreset($val,$dc)
      {
	
      	if ($val=='') {
    			$val=($dc->__get('activeRecord')->ftc_preset_id=='')?'-':$dc->__get('activeRecord')->ftc_preset_id;
    		}
  		  if($val=='-') {
  		
      		 $Preset = $this->getDefaultPreset(); 
           $this->setPresets($Preset,$dc->__get('activeRecord')->id,$dc); 	

	   	  }else{

  	      	$objPreset = ftcPresetsModel::findByID($val);
  	      
  	      	if ($objPreset===Null) {
  		      	$Preset = $this->getDefaultPreset(); 
               $this->setPresets($Preset,$dc->__get('activeRecord')->id,$dc); 
  		      	return '-';
  	      	}
  	       	$Preset = $objPreset->row();
  	      	$this->setPresets(array($Preset),$dc->__get('activeRecord')->id,$dc);
  	      	
        }
       
        return $val;
      }
     //get default options
     public function getDefaultPreset()
      {

      	$Presets = (ftcPresetsModel::findAll()===NULL)?array():ftcPresetsModel::findAll()->fetchAll();

      	foreach ($Presets as $k => $v) {
      	if ($Presets[$k]['use_as_default_for']=='') {continue;}
	      	if (in_array($this->getKey(), unserialize($Presets[$k]['use_as_default_for']))) {
	      		unset($Presets[$k]['use_as_default_for'],$Presets[$k]['show_in_sections'],$Presets[$k]['tstamp'],$Presets[$k]['name'],$Presets[$k]['description'],$Presets[$k]['preview']);
	      		$Default = $Presets[$k];

				$this->defaultPreset = true; 
	      		continue;
	      	}
      	
		
      	}
      	
      	if ($this->defaultPreset===false) {
      		$Default = array('small' => '-' ,'medium' => '-' ,'large' => '-' ,'xlarge' => '-' ,'xxlarge' => '-' ,'pull' => '-', 'push' => '-' ,'custom' => '','align' => 'a:1:{i:0;s:1:"-";}', 'float_ftc' => '-' );
     
      	}
          return $Default;	
      } 

    
     
    public function setPresets($Preset,$id,$dc)
      {	
      		$strClass = $this->getStrClass();
      		$DoModel = $strClass::findByID($id);
          if ($DoModel===NULL) {return;}
          $updateFieldsArr = $this->getFieldsForUpdate($dc->__get('activeRecord'));
          foreach ($updateFieldsArr as $field) {
             $PresetModel = ftcPresetsModel::findByID($dc->__get('activeRecord')->$field['id']);
             if($PresetModel===NULL){continue;}
             $Preset = $PresetModel->row();

             $DoModel->$field['combined']=(is_array($Preset))?serialize($Preset):$Preset;   
          }
          $DoModel->save(true); 
      		return;
      		      		
      }
     
    

}

?>
