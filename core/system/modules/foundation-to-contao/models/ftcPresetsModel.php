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
    
    public function getKey()
     {    
	     if(\Input::get('table')===NULL){
	     	 $this->strTableKey = \Input::get('do');
	     
	     }else{
	    	 $this->strTableKey = substr(\Input::get('table'), 3, (strlen(\Input::get('table')))-3);

	     }
     	return $this->strTableKey;  
    }
    
    //get grid value and generate options
    public function getPresets()
     {
    
     $objModel = ftcPresetsModel::findAll()->fetchAll();
     $Presets = $objModel;
     $optionsArr = array();
     
     $optionsArr['-'] = '-';
      $i = 1	; 
	     foreach ($Presets as $preset) {//&&\Input::get('act')=='edit'
		     if(in_array($this->getKey(),unserialize($preset['show_in_sections']))){
		    	$optionsArr[$preset['id']]= $preset['name'];
		 		$i++;
		     }
	     }

     return $optionsArr;
     	
     }
     
     //get align value and generate options
     public function getSelectedPreset($val,$dc,$custom=false)
      {
		
		$addCustom = $dc->__get('activeRecord')->add_custom_settings;
		
		if ($val=='') {
			$val=($dc->__get('activeRecord')->presets_ftc=='')?'-':$dc->__get('activeRecord')->presets_ftc;
		}
		if($val=='-') {
		
		 $this->getDefaultPreset(); 
		 if ($addCustom=='1') {
		 	$Preset = $dc->__get('activeRecord')->custom_preset_ftc;
		 	
		 	if ($Preset=='') {
		 	$this->getDefaultPreset();
		 	}else {
		 	$this->setPresets($Preset,$custom);	
		 	}
		 	
		 	
		 }	
		}else{
				
	      	$objPreset = ftcPresetsModel::findByID($val);
	      
	      	if ($objPreset===Null) {
		      	$this->getDefaultPreset();
		      	return '-';
	      	}
	     	$Preset = $objPreset->row();
	      	if (\Input::get('act')=='edit'){

	      	$this->setPresets(array($Preset));
	      	
	      	}
	      	if (\Input::get('act')=='editAll'){
	      	
	      	$this->setPresets(array($Preset),false,$dc->__get('activeRecord')->id,$dc);
	      	
	      	}
      	
     	
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
     	     		 
     	$this->setPresets(array($Default));
     	
          	
      } 
    public function getStrClass()
     {	
     	$key = $this->getKey();
     	
	     if($key=='formfield') {
	     	$strClass = 'FormFieldModel';
	     }else {
	    	$strClass = strtoupper(substr($key, 0, 1)).substr($key, 1, (strlen($key)-1)).'Model';	
	     }
	     return $strClass;
     } 
     
    public function setPresets($Preset,$custom=false,$id=true,$dc=false)
      {	
      		$strClass = $this->getStrClass();
      		
      		if (\Input::get('act')=='edit'&&$id) { $id = \Input::get('id');}
      		
      		$DoModel = $strClass::findByID($id);
      		
      		if ($DoModel===NULL) {
      			return;
      		}
      		if (\Input::get('act')=='editAll'&&$dc!==false) { }

      		if ($DoModel->custom_preset_ftc=='') {$custom=true;}
      		
      		if($DoModel->add_custom_settings==''){//$DoModel->presets_ftc!=='-'&&
				$DoModel->aktiv_preset_ftc=(is_array($Preset))?serialize($Preset):$Preset;
	      		$DoModel->save(true);
	      
	      		return;
      		}
      		
      		if ($DoModel->add_custom_settings=='1'&&$custom) {
      		
      			$DoModel->custom_preset_ftc = (is_array($Preset))?serialize($Preset):$Preset;
     			
      			$DoModel->save(true);

      		}
      		
      		
      }
      
     public function getAllSelectedPresets($val,$dc)
     {
     	if (\Input::get('act')=='editAll'){
     	$this->getSelectedPreset($val,$dc);
     	}
    	elseif (\Input::get('act')=='edit'){
    	$this->getSelectedPreset($val,$dc,true);
    	}
     
     	return $val;

     } 
     
     
    

}



?>
