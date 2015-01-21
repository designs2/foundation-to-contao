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

	
	

	
	public function update($table,$id,$dc) 
	{
		//var_dump($table,$id,$dc->__get('activeRecord')->row());
		//if (\Input::get('act')!=='edit'&&$dc!==false) { return;}
		
		$PresetsArr = $dc->__get('activeRecord')->row();

		if($PresetsArr['show_in_sections'] ==''){return;}	
		$PresetsArr['show_in_sections']=(is_array($PresetsArr['show_in_sections']))?$PresetsArr['show_in_sections']:unserialize($PresetsArr['show_in_sections']);	
		foreach ($PresetsArr['show_in_sections'] as $key) {

			if ($key=='layout') {continue;}
				$strClass = $this->getStrClass($key);
				$updateFieldsArr = $this->getFields($key);
				var_dump($updateFieldsArr);
	          foreach ($updateFieldsArr as $field) {

	          		$DoModels = $this->getModels($strClass,$field['id'],$dc->__get('activeRecord')->id);
	          		if ($DoModels===NULL) {return;}
	          		foreach ($DoModels as $DoModel) {
	          			//$defM = $strModel::findBy('id',$m['id']);
						$DoModel->$field['combined'] = $this->getFitPreset($PresetsArr);
						$DoModel->save(true);
	          		}
				
			}
			
		}
		exit;
		if($PresetsArr['use_as_default_for'] ==''){return;}
		$PresetsArr['use_as_default_for']=(is_array($PresetsArr['use_as_default_for']))?$PresetsArr['use_as_default_for']:unserialize($PresetsArr['use_as_default_for']);	
		
		foreach ($PresetsArr['use_as_default_for'] as $key) {
			if ($key=='layout') {continue;}
				$strClass = $this->getStrClass($key);
				$updateFieldsArr  = $this->getFields($key);
	          foreach ($updateFieldsArr as $field) {

	          		$DoModels = $this->getModels($strClass,$field['id'],'-');
	          		if ($DoModels===NULL) {return;}
	          		foreach ($DoModels as $DoModel) {
						$DoModel->$field['combined'] = $this->getFitPreset($PresetsArr);
						$DoModel->save(true);
	          		}
			
				}
		}
		//exit;

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
	 	       
	 //get default options
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