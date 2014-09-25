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


$GLOBALS['TL_DCA']['tl_module']['palettes']['mh_foundation_to_contao']    = '{title_legend},name,headline,type;
{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_offcanvas']    = '{title_legend},name,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected,offcanvas_align,top_bar;{reference_legend:hide},defineRoot;{template_legend:hide},navigationTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_offcanvas_custom']    = '{title_legend},name,type;{nav_legend},pages,showProtected,offcanvas_align,top_bar;{template_legend:hide},navigationTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_start']    = '{title_legend},name,type;{topbar_legend},topbar_locate,topbar_options,headline;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_stop']    = '{title_legend},name,type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_section']    = '{title_legend},name,type;{nav_legend},dropdown_level,levelOffset,showLevel,hardLimit,showProtected,offcanvas_align;{reference_legend:hide},defineRoot;{template_legend:hide},navigationTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['ftc_topbar_section_custom']  = '{title_legend},name,type;{nav_legend},pages,showProtected,offcanvas_align,top_bar;{template_legend:hide},navigationTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


//selector
 array_insert($GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'] ,1,array('top_bar'));
 
 //subpalettes
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['top_bar']='top_bar_left,top_bar_right,headline';


$palettes = $GLOBALS['TL_DCA']['tl_module']['palettes'];
foreach ($palettes as $p => $str) {
	 $pallete_ftc = str_replace("{title_legend}","{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{title_legend}",$str);
	 $GLOBALS['TL_DCA']['tl_module']['palettes'][$p]=$pallete_ftc;
}

 
$GLOBALS['TL_DCA']['tl_module']['palettes']['default'] = $pallete_ftc;
	  
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
	//meta grid
	'small_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['small_ftc'],
				'default'                 => 'small-12',
				
				'exclude'                 => true,
				 'sorting' 				  => true,
				'filter'                  => true,
				'inputType'               => 'select',
				'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_module']['small_ftc_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
		'large_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_module']['large_ftc'],
					'default'                 => 'large-12',
				
					'exclude'                 => true,
					 'sorting' 				  => true,
					'filter'                  => true,
					'inputType'               => 'select',
					'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
					'reference'               => &$GLOBALS['TL_LANG']['tl_module']['large_ftc_options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		'float_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_module']['float_ftc'],
					'default'                 => '',
					'options'=>array(' ','left','right'),
					'exclude'                 => true,
					 'sorting' 				  => true,
					'filter'                  => true,
					'inputType'               => 'select',
				//	'options_callback'        => array('tl_module', 'getSmallOpitons'),
					'reference'               => &$GLOBALS['TL_LANG']['tl_module']['options'],
					'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		   'align_ftc' => array
		   		(
		   			'label'                   => &$GLOBALS['TL_LANG']['tl_module']['align_ftc'],
		   			'default'                 => '',
		   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
		   			'exclude'                 => true,
		   			 'sorting' 				  => true,
		   			'filter'                  => true,
		   			'inputType'               => 'select',
		   		//	'options_callback'        => array('tl_module', 'getSmallOpitons'),
		   			'reference'               => &$GLOBALS['TL_LANG']['tl_module']['options'],
		   			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   			'sql'                     => "varchar(255) NOT NULL default ''"
		   		)
		      
		   
	   
	  ));
	  
	  


?>