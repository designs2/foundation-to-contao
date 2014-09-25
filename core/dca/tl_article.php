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
 $pallete_ftc = str_replace("{teaser_legend:hide}","{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{teaser_legend:hide},add_ftc_settings",$palettes);
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_article']['fields'])-1;
 
// var_dump($palettes);
// echo'<br>';
// var_dump($pallete_ftc);
 
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = $pallete_ftc;
	  
	array_insert($GLOBALS['TL_DCA']['tl_article']['fields'], $fieldsSize, array
	(
	'small_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_article']['small_ftc'],
				'default'                 => 'small-12',
				//'options'=>array('topic',' '),
				'exclude'                 => true,
				 'sorting' 				  => true,
				'filter'                  => true,
				'inputType'               => 'select',
				'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
			//	'reference'               => &$GLOBALS['TL_LANG']['tl_article']['options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
		'large_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_article']['large_ftc'],
					'default'                 => 'large-12',
					//'options'=>array('topic',' '),
					'exclude'                 => true,
					 'sorting' 				  => true,
					'filter'                  => true,
					'inputType'               => 'select',
					'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
				//	'reference'               => &$GLOBALS['TL_LANG']['tl_article']['options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		'float_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_article']['float_ftc'],
					'default'                 => '',
					'options'=>array(' ','left','right'),
					'exclude'                 => true,
					 'sorting' 				  => true,
					'filter'                  => true,
					'inputType'               => 'select',
				//	'options_callback'        => array('tl_article', 'getSmallOpitons'),
					'reference'               => &$GLOBALS['TL_LANG']['tl_article']['options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		   'align_ftc' => array
		   		(
		   			'label'                   => &$GLOBALS['TL_LANG']['tl_article']['align_ftc'],
		   			'default'                 => '',
		   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
		   			'exclude'                 => true,
		   			 'sorting' 				  => true,
		   			'filter'                  => true,
		   			'inputType'               => 'select',
		   		//	'options_callback'        => array('tl_article', 'getSmallOpitons'),
		   			'reference'               => &$GLOBALS['TL_LANG']['tl_article']['options'],
		   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   			'sql'                     => "varchar(255) NOT NULL default ''"
		   		),
		   'add_ftc_settings' => array
		   				(
		   					'label'                   => &$GLOBALS['TL_LANG']['tl_article']['add_ftc_settings'],
		   					'exclude'                 => true,
		   					'inputType'               => 'checkbox',
		   					'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
		   					'sql'                     => "char(1) NOT NULL default ''"
		   				)
		      
		   
	   
	  ));
	  
	  
	  
	  ?>