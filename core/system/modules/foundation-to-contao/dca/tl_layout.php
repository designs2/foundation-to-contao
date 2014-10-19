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
 
 $paletteMain='{ftc_legend},ftc_preset_id_main,ftc_preset_full_main;{ftc_module_legend},use_offcanvas;';
 
 $palettes = $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'];
 $palettesHide ='{jquery_legend},addJQuery;{mootools_legend},addMooTools;';
 
 $palettes_ftc = str_replace("{title_legend}",$paletteMain."{title_legend}",$palettes);
 $palettes_ftc2  = str_replace($palettesHide,"{ftc_js_legend},addFoundation;".$palettesHide,$palettes_ftc);
 // $palettes_ftc3  = str_replace(',static',"",$palettes_ftc2);
 // $palettes_ftc4  = str_replace(',stylesheet',"",$palettes_ftc3);
 $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = $palettes_ftc2;
 
 array_insert($GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'] ,1,array('addFoundation'));
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_layout']['fields'])-1;

//header,left,main,right,footer
//nur header
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['rows_2rwh']='ftc_preset_id_rwh,ftc_preset_full_rwh';
//nur footer
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['rows_2rwf']='ftc_preset_id_rwf,ftc_preset_full_rwf';
//header+footer
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['rows_3rw']='ftc_preset_id_rwh,ftc_preset_full_rwh,ftc_preset_id_rwf,ftc_preset_full_rwf';
//left
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2cll']='ftc_preset_id_cll,ftc_preset_full_cll';
//right
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2clr']='ftc_preset_id_clr,ftc_preset_full_clr';
//left+right
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_3cl']='ftc_preset_id_cll,ftc_preset_full_cll,ftc_preset_id_clr,ftc_preset_full_clr';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['addFoundation']='FoundationJS,FTC_JS';


	  
	array_insert($GLOBALS['TL_DCA']['tl_layout']['fields'], $fieldsSize, array
	(
	
	//ftc Modules Settings
	'use_offcanvas' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['use_offcanvas'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>false),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	//header
	'ftc_preset_id_rwh' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['ftc_preset_id_rwh'],
		'default'                 => '-',
		'exclude'                 => true,
		 'sorting' 				  => true,
		'filter'                  => true,
		'inputType'               => 'select',
		'options_callback'        => array('ftcPresetsModel', 'getPresets'),
		'load_callback'			 => array(
		array('ftcPresetsModel', 'getSelectedPreset')
			),
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default '-'"
	),
	'ftc_preset_full_rwh' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_full'],

		'exclude'                 => true,
		'inputType'               => 'hidden',
		'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
		'sql'                     => "text NULL"
	),
		   		
		   	//footer
   'ftc_preset_id_rwf' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['ftc_preset_id_rwf'],
		'default'                 => '-',
		'exclude'                 => true,
		 'sorting' 				  => true,
		'filter'                  => true,
		'inputType'               => 'select',
		'options_callback'        => array('ftcPresetsModel', 'getPresets'),
		'load_callback'			 => array(
		array('ftcPresetsModel', 'getSelectedPreset')
			),
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default '-'"
	),
	'ftc_preset_full_rwf' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_full'],

		'exclude'                 => true,
		'inputType'               => 'hidden',
		'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
		'sql'                     => "text NULL"
	),
		   			   		
	// end header+footer
		  		   				   		
	//left
   	'ftc_preset_id_cll' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['ftc_preset_id_cll'],
		'default'                 => '-',
		'exclude'                 => true,
		 'sorting' 				  => true,
		'filter'                  => true,
		'inputType'               => 'select',
		'options_callback'        => array('ftcPresetsModel', 'getPresets'),
		'load_callback'			 => array(
		array('ftcPresetsModel', 'getSelectedPreset')
			),
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default '-'"
	),
	'ftc_preset_full_cll' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_full'],

		'exclude'                 => true,
		'inputType'               => 'hidden',
		'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
		'sql'                     => "text NULL"
	),
   	//right
   	'ftc_preset_id_clr' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['ftc_preset_id_clr'],
		'default'                 => '-',
		'exclude'                 => true,
		 'sorting' 				  => true,
		'filter'                  => true,
		'inputType'               => 'select',
		'options_callback'        => array('ftcPresetsModel', 'getPresets'),
		'load_callback'			 => array(
		array('ftcPresetsModel', 'getSelectedPreset')
			),
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default '-'"
	),
	'ftc_preset_full_clr' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_full'],

		'exclude'                 => true,
		'inputType'               => 'hidden',
		'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
		'sql'                     => "text NULL"
	),
   	//end left+right
		    
    //main
    'ftc_preset_id_main' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_id'],
		'default'                 => '-',
		'exclude'                 => true,
		 'sorting' 				  => true,
		'filter'                  => true,
		'inputType'               => 'select',
		'options_callback'        => array('ftcPresetsModel', 'getPresets'),
		'load_callback'			 => array(
		array('ftcPresetsModel', 'getSelectedPreset')
			),
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default '-'"
	),
	'ftc_preset_full_main' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['ftc_preset_full'],

		'exclude'                 => true,
		'inputType'               => 'hidden',
		'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
		'sql'                     => "text NULL"
	),
	'addFoundation' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['addFoundation'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'FoundationSource' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FoundationSource'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => array('local', 'cdn', 'fallback'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FoundationSource_options'],
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'FoundationJS' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FoundationJS'],
		'exclude'                 => true,
		'default'                  => 'a:9:{i:0;s:9:"accordion";i:1;s:8:"clearing";i:2;s:5:"orbit";i:3;s:8:"dropdown";i:4;s:5:"alert";i:5;s:6:"reveal";i:6;s:3:"tab";i:7;s:9:"equalizer";i:8;s:9:"offcanvas";}',
		'inputType'               => 'checkbox',
		'options'        => array('abide','accordion',
		'clearing', 'orbit','dropdown','tooltip','alert', 'reveal',
		'tab', 'joyride','equalizer','slider','topbar','offcanvas','magellan'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FoundationJS_options'],
		'eval'                    => array('multiple'=>true,'class'=>'w50 m12" style="height:auto'),
		'sql'                     => "text NULL"
	),
	'FTC_JS' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FTC_JS'],
		'exclude'                 => true,
		'filter'                  => true,
		'search'                  => true,
		'inputType'               => 'checkbox',
		'options'        => array('modernizr','jquery','jquery.cookie','placeholder','fastclick','mediaelement_player'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FTC_JS_options'],
		'eval'                    => array('multiple'=>true,'class'=>'w50 m12" style="height:auto'),
		'sql'                     => "text NULL"
	)

));
	  $GLOBALS['TL_DCA']['tl_layout']['fields']['framework']['options'] = array('tinymce.css');

	  
	  
//	  <!-- Google CDN jQuery with local fallback if offline -->
//	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
//	  <script>window.jQuery || document.write('<script src="fileadmin/templates/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	  
 
?>