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
	
	
	public function update($dc) 
	{
		
		if (\Input::get('act')!=='edit'&&$dc!==false) { return;}
		$Rel='id';
		$PresetsArr = $this->getPresets($this->model,$Rel,$_GET['id']);
			//var_dump($PresetsArr);
		
		foreach (unserialize($PresetsArr[0]['show_in_sections']) as $key) {
		
			if ($key=='layout') {continue;}
				$strModel = $this->getStrClass($key);
			$arrModelsDC=$this->getModels($strModel,'ftc_preset_id',$_GET['id']);
//			var_dump($_GET['id'],$arrModelsDC);
//			exit;
			foreach ($arrModelsDC as $m) {
				$defM = $strModel::findBy('id',$m['id']);
				$defM->ftc_preset_full = serialize($this->getDefaultPreset($_GET['id']));
				$defM->save();
//				var_dump($strModel,$defM->id,$defM->ftc_preset_full);
//				echo'<br>';
				
			}
			unset($arrModels);
		}
		foreach (unserialize($PresetsArr[0]['use_as_default_for']) as $key) {
			if ($key=='layout') {continue;}
		
			
			$strModel = $this->getStrClass($key);

			$arrModelsDEF=$this->getModels($strModel,'ftc_preset_id','-');

			foreach ($arrModelsDEF as $mdf) {
				//var_dump($m['ftc_preset_id']);
				$defM = $strModel::findBy('id',$mdf['id']);
				//$defM->ftc_preset_id= $_GET['id'];
				$defM->ftc_preset_full = serialize($this->getDefaultPreset($_GET['id']));


				if ($key=='form_field'&&$defM->type!=='fieldset'){
				//var_dump($arrModelsDEF,serialize($this->getDefaultPreset($_GET['id'])) );
				//exit;
			
				}
				$defM->save(true);
				
				
			}
			unset($arrModelsDEF);
		}
		

	}
	
//	
	public function getPresets($model,$Rel,$Val) 
	{	
		$arrModel = $model::findBy($Rel,$Val)->fetchAll();
	 	return $arrModel; 
	} 
	
	public function getModels($strModel,$Rel,$Val) 
	{	
		$arrModels = $strModel::findBy($Rel,$Val);
	 	return ($arrModels===NULL)?array():$arrModels->fetchAll(); 
	} 
	
	public function getStrClass($key)
	 {	
	    var_dump($key);
	     if($key=='form_field') {
	     	$strClass = 'FormFieldModel';
	     }else {
	    	$strClass = strtoupper(substr($key, 0, 1)).substr($key, 1, (strlen($key))-1).'Model';	
	    	//var_dump($strClass);
	     }
	     return $strClass;
	 } 
	 	       
	 //get default options
     public function getDefaultPreset($id)
      {

      	$Preset = ftcPresetsModel::findByID($id)->fetchAll();
      	unset($Preset[0]['use_as_default_for'],$Preset[0]['show_in_sections'],$Preset[0]['tstamp'],$Preset[0]['name'],$Preset[0]['description'],$Preset[0]['preview']);
      
      	return $Preset;
      }

}
