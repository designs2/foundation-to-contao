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
		 $ftc_grid = '{ftc_legend},ftc_preset_id,ftc_preset_full,data_attr_ftc,ftc_preset_add_custom;';
		  
		 $palettes = $GLOBALS['TL_DCA']['tl_content']['palettes'];
		// array_push($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'],'ftc_preset_add_custom');
		  //$GLOBALS['TL_DCA']['tl_content']['subpalettes']['ftc_preset_add_custom']='ftc_preset_custom';
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
	public function formfield_onload($dc) 
	{
		//,data_attr_ftc,ftc_preset_add_custom
		 $ftc_grid = "{ftc_legend},ftc_preset_id,ftc_preset_full,label_classes;{fix_legend},label_role,ftc_preset_id_label,ftc_preset_full_label,post_pre_fix;";
 
		 $palettes = $GLOBALS['TL_DCA']['tl_form_field']['palettes'];

		 $exception = array('row_start','row_stop','col_stop');
		 foreach ($palettes as $p => $str) {
		 	// echo '<br>$p '.$p;
		 	if (in_array($p,$exception)){continue;}
		 	 $pallete_ftc = str_replace("{type_legend}",$ftc_grid."{type_legend}",$str);
		 	 $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$p]=$pallete_ftc;
		 }
	}
//	
	

}
