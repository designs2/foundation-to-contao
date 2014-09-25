<?php //if (!defined('TL_ROOT')) die('You can not access this file directly!');
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
class Callbacks extends \Backend
{

	
	
	
	
	public function content_onload($dc) 
	{
		
		//var_dump( $GLOBALS['TL_DCA']['tl_content']['palettes']);
		 $ftc_grid = '{ftc_legend},presets_ftc,aktiv_preset_ftc,data_attr_ftc,add_custom_settings;';
		  
		 $palettes = $GLOBALS['TL_DCA']['tl_content']['palettes'];
		// array_push($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'],'add_custom_settings');
		  //$GLOBALS['TL_DCA']['tl_content']['subpalettes']['add_custom_settings']='custom_preset_ftc';
		 $exception = array('row_start','row_stop','col_stop');
		 foreach ($palettes as $p => $str) {
		 	// echo '<br>$p '.$p;
		 	if (in_array($p,$exception)){continue;}
		 	 if ($p=='list') {
		 	 $str = str_replace("listitems","listitems,list_style_type",$str);	
		 	 }
		 	 $pallete_ftc = str_replace("{type_legend}",$ftc_grid."{type_legend}",$str);
		 	 $GLOBALS['TL_DCA']['tl_content']['palettes'][$p]=$pallete_ftc;
		 }
		
//		$fieldsSize=count($GLOBALS['TL_DCA']['tl_content']['fields'])-1;
//		$palettesSize=count($palettes)-1;
//		$default = '{type_legend},type,headline;';
//		$expert ='{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
	}
	
//	
	

}
