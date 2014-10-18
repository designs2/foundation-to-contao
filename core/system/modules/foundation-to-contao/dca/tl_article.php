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
 array_push($GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'],'ftc_preset_add_custom');
 $GLOBALS['TL_DCA']['tl_article']['subpalettes']['ftc_preset_add_custom']='ftc_preset_custom';
 $pallete_ftc = str_replace("{teaser_legend:hide}","{ftc_legend},ftc_preset_id,ftc_preset_full,ftc_preset_add_custom;{teaser_legend:hide}",$palettes);//,add_ftc_settings
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_article']['fields'])-1;

 
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = $pallete_ftc;
	  
	array_insert($GLOBALS['TL_DCA']['tl_article']['fields'], $fieldsSize, array
	(
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
			//	'reference'               => &$GLOBALS['TL_LANG']['tl_article']['options'],
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
	
   'add_ftc_settings' => array
   				(
   					'label'                   => &$GLOBALS['TL_LANG']['MSC']['add_ftc_settings'],
   					'exclude'                 => true,
   					'inputType'               => 'checkbox',
   					'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
   					'sql'                     => "char(1) NOT NULL default ''"
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