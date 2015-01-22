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

//use ftcPresetsModel;
class Presets extends \Backend
{

	public $defaultPreset = false;

	public function onversion_callback($table,$id,$dc) 
	{
		$Preset = 'getFitPreset';
		$this->update($dc,$Preset,'version');
	}
	public function ondelete_callback($dc) 
	{
		$Preset = 'getDefaultPreset';
		$this->update($dc,$Preset,'delete');
	}

	public function update($dc,$getPreset,$type) 
	{
		//if (\Input::get('act')!=='edit'&&$dc!==false) { return;}
		$PresetsArr = array('show_in_sections'=>$dc->__get('activeRecord')->id,'use_as_default_for'=>'-');//$dc->__get('activeRecord')->row();

		foreach ($PresetsArr as $arr=>$val) {

			if($dc->__get('activeRecord')->$arr ==''){return;}	
			$dc->__get('activeRecord')->$arr =(is_array($dc->__get('activeRecord')->$arr))?$dc->__get('activeRecord')->$arr :unserialize($dc->__get('activeRecord')->$arr );	
			
			foreach ($dc->__get('activeRecord')->$arr as $key) {
				$getPresetF= ($type=='version')?$this->$getPreset($dc->__get('activeRecord')->row()):$this->$getPreset($key,$dc->__get('activeRecord')->id);
				if ($key=='layout') {continue;}
					$strClass = $this->getStrClass($key);
					$updateFieldsArr = $this->getFields($key);
					//var_dump($updateFieldsArr);

		          foreach ($updateFieldsArr as $field) {

		          		$DoModels = $this->getModels($strClass,$field['id'],$val);

		          		if ($DoModels===NULL) {continue;}
		          		//var_dump($DoModels);
		          		foreach ($DoModels as $DoModel) {
		          			if ($type=='delete') {
		          				$DoModel->$field['id'] = $val;
		          				$this->defaultPreset = false; 
		          			}
							$DoModel->$field['combined'] = $getPresetF;
							$DoModel->save();
		          		}
					
					}
				
				}
		}

	}
	
	
	public function getModels($strModel,$Rel,$Val) 
	{	
		$objModels = $strModel::findBy($Rel,$Val);
	 	return $objModels; //($arrModels===NULL)?array():$arrModels->fetchAll(); 
	} 
	
	public function getStrClass($key)
	 {	
	     if($key=='form_field') {
	     	$strClass = 'FormFieldModel';
	     }else {
	    	$strClass = strtoupper(substr($key, 0, 1)).substr($key, 1, (strlen($key))-1).'Model';	
	     }
	     return $strClass;
	 } 
	   //get default options needed for delete
     public function getDefaultPreset($key,$id)
      {
        $Presets = (\ftcPresetsModel::findAll()===NULL)?array():\ftcPresetsModel::findAll()->fetchAll();
        $arrCacheP = (!$arrCache)?array(): $arrCacheP;
        if (isset($arrCacheP[$key])) {
        	return $arrCacheP[$key];
        }
        foreach ($Presets as $k => $v) {
        if ($Presets[$k]['use_as_default_for']=='') {continue;}
          if (in_array($key, unserialize($Presets[$k]['use_as_default_for']))&&$Presets[$k]['id']!==$id) {
            unset($Presets[$k]['use_as_default_for'],$Presets[$k]['show_in_sections'],$Presets[$k]['tstamp'],$Presets[$k]['name'],$Presets[$k]['description'],$Presets[$k]['preview']);
            $Default = $Presets[$k];
            $this->defaultPreset = true; 
            continue;
          }
    
        }
        
        if ($this->defaultPreset===false) {
          $Default = array('small' => '-' ,'medium' => '-' ,'large' => '-' ,'xlarge' => '-' ,'xxlarge' => '-' ,'pull' => '-', 'push' => '-' ,'custom' => '','align' => 'a:1:{i:0;s:1:"-";}', 'float_ftc' => '-' );
     
        }
        $arrCacheP[$key] = $Default;
        var_dump( $arrCacheP);
          return $Default;  
      }  	    

	 //get fit options
     public function getFitPreset($Preset)
      {
      	unset($Preset['use_as_default_for'],$Preset['show_in_sections'],$Preset['tstamp'],$Preset['name'],$Preset['description'],$Preset['preview']);
      
      	return serialize($Preset);
      }
           // get fields in backend sections like article, content, .. which use presets
    public function getFields($key)
     {  

      if($GLOBALS['TL_DCA']['tl_'.$key]===NULL){
        $this->loadDataContainer('tl_'.$key);
      }
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


}
?>