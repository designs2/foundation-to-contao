<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
* @package   Foundation To Contao
* @author    Monique Hahnefeld
* @license   LGPL
* @copyright 2014 Monique Hahnefeld
 */
$ftc_grid = '{ftc_legend},ftc_preset_id,ftc_preset_full,ftc_preset_add_custom;';
$default = '{title_legend},name,headline,type;';
$expert ='{template_legend:hide},navigationTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';



//$GLOBALS['TL_DCA']['tl_module']['palettes']['mh_foundation_to_contao']    = '{title_legend},name,headline,type;
//{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_offcanvas']    = $default.'{nav_legend},levelOffset,showLevel,hardLimit,showProtected,offcanvas_align,top_bar;{reference_legend:hide},defineRoot;'.$expert;
$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_offcanvas_custom']    = $default.'{nav_legend},pages,showProtected,offcanvas_align,top_bar;'.$expert;

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_start']    = $default.'{topbar_legend},topbar_locate,topbar_options;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_stop']    = $default.'{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_section']    = $default.'{nav_legend},dropdown_level,levelOffset,showLevel,hardLimit,showProtected,offcanvas_align;{reference_legend:hide},defineRoot;'.$expert;

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_section_custom']  = $default.'{nav_legend},pages,showProtected,offcanvas_align,top_bar;'.$expert;


//selector
 array_insert($GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'] ,1,array('top_bar','ftc_preset_add_custom'));
 
 //subpalettes
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['top_bar']='top_bar_left,top_bar_right';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['ftc_preset_add_custom']='ftc_preset_custom';


$palettes = $GLOBALS['TL_DCA']['tl_module']['palettes'];
foreach ($palettes as $p => $str) {
	 $pallete_ftc = str_replace("{title_legend}",$ftc_grid."{title_legend}",$str);
	 $GLOBALS['TL_DCA']['tl_module']['palettes'][$p]=$pallete_ftc;
}

	  
array_insert($GLOBALS['TL_DCA']['tl_module']['fields'], $fieldsSize, array
(
	//topbar + dropdown
	'dropdown_level' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dropdown_level'],
		'exclude'                 => true,
		'placeholder'=>'0',
		'default'=>'0',
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>16, 'tl_class'=>'clr w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'topbar_options' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['topbar_options'],
		'exclude'                 => true,
		'placeholder'=>'is_hover: false;sticky_on: large',
		'default'=>'is_hover: false;sticky_on: large',
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	
	'topbar_locate' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['topbar_locate'],
				'default'                 => 'fixed',
				//'options'=>array('topic',' '),
				
				'inputType'               => 'select',
				'options'        => array('fixed','sticky', 'contain_to_grid'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_module']['topbar_locate_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
	//offcanvas + tapbar
	'offcanvas_align' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['offcanvas_align'],
				'default'                 => 'left',
				//'options'=>array('topic',' '),
				
				'inputType'               => 'select',
				'options'        => array('left', 'right'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_module']['offcanvas_align_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
	'top_bar' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['top_bar'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'top_bar_left' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['top_bar_left'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>false, 'tl_class'=>' w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'top_bar_right' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['top_bar_right'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'ftc_preset_id' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_id'],
				'default'                 => '-',
				//'options'=>array('topic',' '),
				'exclude'                 => true,
				 'sorting' 				  => true,
				'filter'                  => true,
				'inputType'               => 'select',
				'options_callback'        => array('ftcPresetsModel', 'getPresets'),
				'load_callback'			 => array(
				array('ftcPresetsModel', 'getSelectedPreset')
					),
				'save_callback'			 => array(
					array('ftcPresetsModel', 'getAllSelectedPresets')
						),	
			//	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default '-'"
			),
	'ftc_preset_full' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_full'],

				'exclude'                 => true,
				'inputType'               => 'hidden',
			//	'options_callback'        => array('ftcSettingsModel', 'getSelectedPreset'),
				'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
				
				'sql'                     => "text NULL"
			),
	'ftc_preset_custom' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_custom'],

				'exclude'                 => true,
				'inputType'               => 'GridWizard',
				//'load_callback'        => array('ftcSettingsModel', 'getSelectedPreset'),
				'eval' => array
				(
				    'tl_class'          => 'clr',
				    'doNotShow' =>true
			
				    
				),    
				
				'sql'                     => "text NULL"
			),
	'ftc_preset_add_custom' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_add_custom'],
				'exclude'                 => true,
				'inputType'               => 'checkbox',
				'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50'),
				'sql'                     => "char(1) NOT NULL default ''"
			)
	   
	  ));
	  
	  


?>