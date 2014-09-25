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


class Themes extends \Backend
{

	
	protected $model = 'ftcSettingsModel';
	
	
	public function generate($dc) 
	{
		$Rel='id';
		$SettingsArr = $this->getSettings($this->model,$Rel,$_GET['id']);
		$folder_url = $SettingsArr[0]['theme_folder'];
			
		$savePath=TL_ROOT.'/'.$folder_url ;
		
		$settingsFile = '_settings.scss';
		$componentsFile = str_replace(' ', '-',strtolower($SettingsArr[0]['name'])).'.scss';
		$content = '';
		$config = '';
		//exit;
	
		if (!file_exists($savePath)){
		mkdir($savePath);
		}
	
		$content .= '// Contao Open Source CMS, (c) 2014 Monique Hahnefeld, LGPL license'."\r\n\r\n\t".'@import "../foundation/scss/foundation/functions";'."\r\n";
		$config .= '
		// Foundation by ZURB
		// foundation.zurb.com
		// Licensed under MIT Open Source
		
		// Make sure the charset is set appropriately
		@charset "UTF-8";
		@import "settings";
		
		// Behold, here are all the Foundation components.
		@import'."\r\n";

		//use this globals
		//$GLOBALS['TL_LANG'][$dc]['radius']['var_scss']
		//$GLOBALS['TL_LANG'][$dc]['radius']['pre_scss']
		//$GLOBALS['TL_LANG'][$dc]['radius']['post_scss']

		if (file_exists($savePath."/".$settingsFile)) {
			unlink($savePath."/".$settingsFile);
		}
		if (file_exists($savePath."/".$componentsFile)) {
			unlink($savePath."/".$componentsFile);
		}
		$handle = fopen($savePath."/".$settingsFile, "w+");
		$componentsHandle = fopen($savePath."/".$componentsFile, "w+");
		$countComponents=0;
		foreach ($SettingsArr[0] as $key => $value) {
			if (isset($GLOBALS['TL_LANG'][$dc][$key]['var_scss'])) {
			
				$content .= $GLOBALS['TL_LANG'][$dc][$key]['var_scss'].':';	
				if (isset($GLOBALS['TL_LANG'][$dc][$key]['pre_scss'])) {
				$content .= ''.$GLOBALS['TL_LANG'][$dc][$key]['pre_scss'];	
				}
				$content .= ''.$value;
				if (isset($GLOBALS['TL_LANG'][$dc][$key]['post_scss'])) {
				$content .= ''.$GLOBALS['TL_LANG'][$dc][$key]['post_scss'];	
				}
				$content .= ' ;'."\r\n";	
			}

			if (array_key_exists($key.'_vars', $SettingsArr[0])&&$value=='1') {

				$content .= ''.html_entity_decode($SettingsArr[0][$key.'_vars'])."\r\n";
				if ($key=='global'||$key=='typografie') {continue;}	
				if ($countComponents!==0) {
				$config .= "\t".',';	
				}else {
				$config .= "\t";
				}
				$config .= '"../foundation/scss/foundation/components/'.str_replace('_', '-',$key).'"'."\r\n";
				$countComponents++;
			}
			
		}
		$config .= ';';	
		fputs($handle, $content);
		fputs($componentsHandle,$config);
		fclose($handle);
		fclose($componentsHandle);
		unset($handle);
		unset($componentsHandle);


	}
	
	
	public function getSettings($model,$Rel,$Val) 
	{	
		$objModel = $model::findBy($Rel,$Val)->fetchAll();
	 	return $objModel; 
	} 

	public function changeNav($arrModules, $blnShowAll) 
	{
	unset($arrModules["ftc"]["modules"]["tl_ftc_settings"]);
	return $arrModules;
	}


}
