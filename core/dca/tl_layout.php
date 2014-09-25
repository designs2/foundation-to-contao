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
 
 $paletteMain='{ftc_legend},main_small_ftc,main_large_ftc,main_float_ftc,main_align_ftc;{ftc_module_legend},use_offcanvas;';
 
 $palettes = $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'];
 $palettesHide ='{jquery_legend},addJQuery;{mootools_legend},addMooTools;';
 
 $palettes_ftc = str_replace("{title_legend}",$paletteMain."{title_legend}",$palettes);
 $palettes_ftc2  = str_replace($palettesHide,"{ftc_js_legend},addFoundation;".$palettesHide,$palettes_ftc);
 $palettes_ftc3  = str_replace(',static',"",$palettes_ftc2);
 $palettes_ftc4  = str_replace(',stylesheet',"",$palettes_ftc3);
 $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = $palettes_ftc4;
 
 array_insert($GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'] ,1,array('addFoundation'));
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_layout']['fields'])-1;

//header,left,main,right,footer
//nur header
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['rows_2rwh']='rwh_small_ftc,rwh_large_ftc,rwh_float_ftc,rwh_align_ftc';
//nur footer
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['rows_2rwf']='rwf_small_ftc,rwf_large_ftc,rwf_float_ftc,rwf_align_ftc';
//header+footer
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['rows_3rw']='rwh_small_ftc,rwh_large_ftc,rwh_float_ftc,rwh_align_ftc,rwf_small_ftc,rwf_large_ftc,rwf_float_ftc,rwf_align_ftc';
//left
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2cll']='cll_small_ftc,cll_large_ftc,cll_float_ftc,cll_align_ftc';
//right
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2clr']='clr_small_ftc,clr_large_ftc,clr_float_ftc,clr_align_ftc';
//left+right
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_3cl']='cll_small_ftc,cll_large_ftc,cll_float_ftc,cll_align_ftc,clr_small_ftc,clr_large_ftc,clr_float_ftc,clr_align_ftc';
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
	'rwh_small_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwh_small_ftc'],
				'default'                 => 'small-12',
				'exclude'                 => true,
				'inputType'               => 'select',
				'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['small_ftc_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
		'rwh_large_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwh_large_ftc'],
					'default'                 => 'large-12',
					'exclude'                 => true,
					'inputType'               => 'select',
					'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
					'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['large_ftc_options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		'rwh_float_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwh_float_ftc'],
					'default'                 => '',
					'options'=>array(' ','left','right'),
					'exclude'                 => true,
					'inputType'               => 'select',
					'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['float_ftc_options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		   'rwh_align_ftc' => array
		   		(
		   			'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwh_align_ftc'],
		   			'default'                 => '',
		   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
		   			'exclude'                 => true,
		   			'inputType'               => 'select',
		   			'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['align_ftc_options'],
		   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   			'sql'                     => "varchar(255) NOT NULL default ''"
		   		),
		   		
		   	//footer
		   	'rwf_small_ftc' => array
		   				(
		   					'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwf_small_ftc'],
		   					'default'                 => 'small-12',
		   					'exclude'                 => true,
		   					'inputType'               => 'select',
		   					'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
		   					'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['small_ftc_options'],
		   					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		   					'sql'                     => "varchar(255) NOT NULL default ''"
		   				),
		   	'rwf_large_ftc' => array
		   					(
		   						'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwf_large_ftc'],
		   						'default'                 => 'large-12',
		   						'exclude'                 => true,
		   						'inputType'               => 'select',
		   						'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
		   						'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['large_ftc_options'],
		   						'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		   						'sql'                     => "varchar(255) NOT NULL default ''"
		   					),
		   	'rwf_float_ftc' => array
		   					(
		   						'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwf_float_ftc'],
		   						'default'                 => '',
		   						'options'=>array(' ','left','right'),
		   						'exclude'                 => true,
		   						
		   						
		   						'inputType'               => 'select',
		   						'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['float_ftc_options'],
		   						'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		   						'sql'                     => "varchar(255) NOT NULL default ''"
		   					),
		    'rwf_align_ftc' => array
		   			   		(
		   			   			'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['rwf_align_ftc'],
		   			   			'default'                 => '',
		   			   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
		   			   			'exclude'                 => true,
		   			   		
		   			   			'inputType'               => 'select',
		   			   			'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['align_ftc_options'],
		   			   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   			   			'sql'                     => "varchar(255) NOT NULL default ''"
		   			   		),
		   			   		
		   	//header+footer
		  		   				   		
		   	//left
		   	'cll_small_ftc' => array
	   						(
	   							'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cll_small_ftc'],
	   							'default'                 => 'small-12',
	   							'exclude'                 => true,
	   							
	   							'inputType'               => 'select',
	   							'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
	   							'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['small_ftc_options'],
	   							'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
	   							'sql'                     => "varchar(255) NOT NULL default ''"
	   						),
		   'cll_large_ftc' => array
   							(
   								'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cll_large_ftc'],
   								'default'                 => 'large-12',
   								'exclude'                 => true,
   								'inputType'               => 'select',
   								'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
   								'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['large_ftc_options'],
   								'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   								'sql'                     => "varchar(255) NOT NULL default ''"
   							),
		   	'cll_float_ftc' => array
							(
								'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cll_float_ftc'],
								'default'                 => '',
								'options'=>array(' ','left','right'),
								'exclude'                 => true,
								'inputType'               => 'select',
								'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['float_ftc_options'],
								'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
								'sql'                     => "varchar(255) NOT NULL default ''"
							),
		   	'cll_align_ftc' => array
   					   		(
   					   			'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cll_align_ftc'],
   					   			'default'                 => '',
   					   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
   					   			'exclude'                 => true,
   					   		
   					   			'inputType'               => 'select',
   					   			'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['align_ftc_options'],
   					   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
   					   			'sql'                     => "varchar(255) NOT NULL default ''"
   					   		),
		   	//right
		   	'clr_small_ftc' => array
	   						(
	   							'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['clr_small_ftc'],
	   							'default'                 => 'small-12',
	   							'exclude'                 => true,
	   						
	   							'inputType'               => 'select',
	   							'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
	   							'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['small_ftc_options'],
	   							'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
	   							'sql'                     => "varchar(255) NOT NULL default ''"
	   						),
		   	'clr_large_ftc' => array
   							(
   								'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['clr_large_ftc'],
   								'default'                 => 'large-12',
   								//'options'=>array('topic',' '),
   								'exclude'                 => true,
   								'inputType'               => 'select',
   								'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
   								'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['large_ftc_options'],
   								'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   								'sql'                     => "varchar(255) NOT NULL default ''"
   							),
		   	'clr_float_ftc' => array
   							(
   								'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['clr_float_ftc'],
   								'default'                 => '',
   								'options'=>array(' ','left','right'),
   								'exclude'                 => true,
   							
   								'inputType'               => 'select',
   								'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['float_ftc_options'],
   								'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   								'sql'                     => "varchar(255) NOT NULL default ''"
   							),
		   'clr_align_ftc' => array
   					   		(
   					   			'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['clr_align_ftc'],
   					   			'default'                 => '',
   					   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
   					   			'exclude'                 => true,
   					   			'inputType'               => 'select',
   					   			'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['align_ftc_options'],
   					   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
   					   			'sql'                     => "varchar(255) NOT NULL default ''"
   					   		),
		   	//left+right
		    
		    //main
		    'main_small_ftc' => array
    						(
    							'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['main_small_ftc'],
    							'default'                 => 'small-12',	
    							'exclude'                 => true,
    							'inputType'               => 'select',
    							'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
    							'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['small_ftc_options'],
    							'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
    							'sql'                     => "varchar(255) NOT NULL default ''"
    						),
	    	'main_large_ftc' => array
							(
								'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['main_large_ftc'],
								'default'                 => 'large-12',
								'exclude'                 => true,
								'inputType'               => 'select',
								'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
								'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['large_ftc_options'],
								'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
								'sql'                     => "varchar(255) NOT NULL default ''"
							),
	    	'main_float_ftc' => array
							(
								'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['main_float_ftc'],
								'default'                 => '',
								'options'=>array(' ','left','right'),
								'exclude'                 => true,
								
								
								'inputType'               => 'select',
							//	'options_callback'        => array('tl_layout', 'getSmallOpitons'),
								'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['options'],
								'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
								'sql'                     => "varchar(255) NOT NULL default ''"
							),
		    'main_align_ftc' => array
					   		(
					   			'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['main_align_ftc'],
					   			'default'                 => '',
					   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
					   			'exclude'                 => true,
					   			
					   			
					   			'inputType'               => 'select',
					   		//	'options_callback'        => array('tl_layout', 'getSmallOpitons'),
					   			'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['options'],
					   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
					   			'sql'                     => "varchar(255) NOT NULL default ''"
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
	   			'eval'                    => array('multiple'=>true,'class'=>'w50 m12'),
	   			'sql'                     => "text NULL"
	   		),
	   		'FTC_JS' => array
	   		(
	   			'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FTC_JS'],
	   			'exclude'                 => true,
	   			'filter'                  => true,
	   			'search'                  => true,
	   			'inputType'               => 'checkbox',
	   			'options'        => array('modernizr','jquery','cookie','placeholder','fastclick','mediaelement_player'),
	   			'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FTC_JS_options'],
	   			'eval'                    => array('multiple'=>true,'class'=>'w50 m12'),
	   			'sql'                     => "text NULL"
	   		)

	  ));
	  $GLOBALS['TL_DCA']['tl_layout']['fields']['framework']['options'] = array('tinymce.css');

	  
	  
//	  <!-- Google CDN jQuery with local fallback if offline -->
//	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
//	  <script>window.jQuery || document.write('<script src="fileadmin/templates/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	  
 

	  ?>