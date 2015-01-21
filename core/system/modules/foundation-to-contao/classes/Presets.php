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

	
	protected $model = 'ftcPresetsModel';

	
	public function update($table,$id,$dc) 
	{
		var_dump($table,$id,$dc->__get('activeRecord')->row());
		//if (\Input::get('act')!=='edit'&&$dc!==false) { return;}
		exit;
		$PresetsArr = $dc->__get('activeRecord')->row();

		if($PresetsArr['show_in_sections'] ==''){return;}	
		$PresetsArr['show_in_sections']=(is_array($PresetsArr['show_in_sections']))?$PresetsArr['show_in_sections']:unserialize($PresetsArr['show_in_sections']);	
		foreach ($PresetsArr['show_in_sections'] as $key) {
		var_dump($key);


			if ($key=='layout') {continue;}
				$strClass = $this->getStrClass($key);
				$updateFieldsArr = $model->getFields($key);
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
				$updateFieldsArr = $model->getFields($key);
	          foreach ($updateFieldsArr as $field) {

	          		$DoModels = $this->getModels($strClass,$field['id'],'-');
	          		if ($DoModels===NULL) {return;}
	          		foreach ($DoModels as $DoModel) {
	          			//$defM = $strModel::findBy('id',$m['id']);
						$DoModel->$field['combined'] = $this->getFitPreset($PresetsArr);
						$DoModel->save(true);
	          		}
			
				}
		}
		//exit;

	}
	
	
	public function getModels($strModel,$Rel,$Val) 
	{	
		$arrModels = $strModel::findBy($Rel,$Val);
	 	return ($arrModels===NULL)?array():$arrModels->fetchAll(); 
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

}
?>