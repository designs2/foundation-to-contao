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
 
 
 $palettes = $GLOBALS['TL_DCA']['tl_article']['palettes']['default'];
 array_push($GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'],'add_custom_settings');
 $GLOBALS['TL_DCA']['tl_article']['subpalettes']['add_custom_settings']='custom_preset_ftc';
 $pallete_ftc = str_replace("{teaser_legend:hide}","{ftc_legend},presets_ftc,aktiv_preset_ftc,add_custom_settings;{teaser_legend:hide}",$palettes);//,add_ftc_settings
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_article']['fields'])-1;

 
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = $pallete_ftc;
	  
	array_insert($GLOBALS['TL_DCA']['tl_article']['fields'], $fieldsSize, array
	(
	'presets_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_article']['presets_ftc'],
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
			//	'reference'               => &$GLOBALS['TL_LANG']['tl_article']['options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default '-'"
			),
	'aktiv_preset_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_article']['aktiv_preset_ftc'],

				'exclude'                 => true,
				'inputType'               => 'hidden',
			//	'options_callback'        => array('ftcSettingsModel', 'getSelectedPreset'),
				'eval'               => array('hideInput'=>	true, 'doNotShow' =>true),
				
				'sql'                     => "text NULL"
			),
	'custom_preset_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_article']['custom_preset_ftc'],

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
	
   'add_ftc_settings' => array
   				(
   					'label'                   => &$GLOBALS['TL_LANG']['tl_article']['add_ftc_settings'],
   					'exclude'                 => true,
   					'inputType'               => 'checkbox',
   					'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
   					'sql'                     => "char(1) NOT NULL default ''"
   				),
	'add_custom_settings' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_article']['add_custom_settings'],
					'exclude'                 => true,
					'inputType'               => 'checkbox',
					'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50'),
					'sql'                     => "char(1) NOT NULL default ''"
				)			
		      
		   
	   
	  ));
	  
	  
	  
	  ?>