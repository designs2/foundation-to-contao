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
		//var_dump($table,$id,$dc->__get('activeRecord')->row());
		//if (\Input::get('act')!=='edit'&&$dc!==false) { return;}

		$PresetsArr = $dc->__get('activeRecord')->row();
		if($PresetsArr['show_in_sections'] ==''){return;}		
		foreach (unserialize($PresetsArr['show_in_sections'])as $key) {
		
			if ($key=='layout') {continue;}
				$strModel = $this->getStrClass($key);
				$arrModelsDC=$this->getModels($strModel,'ftc_preset_id',$dc->__get('activeRecord')->id);
			foreach ($arrModelsDC as $m) {
				$defM = $strModel::findBy('id',$m['id']);
				$defM->ftc_preset_full = $this->getDefaultPreset($PresetsArr);
				$defM->save();
				// var_dump($strModel,$defM->id,$defM->ftc_preset_full);
				// echo'<br>';
				
			}
			unset($arrModels);
		}
		if($PresetsArr['use_as_default_for'] ==''){return;}
		foreach (unserialize($PresetsArr['use_as_default_for']) as $key) {
			if ($key=='layout') {continue;}

			$strModel = $this->getStrClass($key);

			$arrModelsDEF=$this->getModels($strModel,'ftc_preset_id','-');
			//var_dump($arrModelsDEF);
			foreach ($arrModelsDEF as $mdf) {

				$defM = $strModel::findBy('id',$mdf['id']);
				$defM->ftc_preset_full = $this->getDefaultPreset($PresetsArr);

				if ($key=='form_field'&&$defM->type!=='fieldset'){
				$defM->ftc_preset_full_label = $this->getDefaultPreset($PresetsArr);
			
				}
				$defM->save(true);
				
			}
			unset($arrModelsDEF);
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
     public function getDefaultPreset($Preset)
      {
      	unset($Preset['use_as_default_for'],$Preset['show_in_sections'],$Preset['tstamp'],$Preset['name'],$Preset['description'],$Preset['preview']);
      
      	return serialize($Preset);
      }

}
?>