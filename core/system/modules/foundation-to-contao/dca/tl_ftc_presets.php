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


/**
 * Table tl_ftc_presets
 */
$GLOBALS['TL_DCA']['tl_ftc_presets'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'Vwidth'            => 640,
		'Vheight'            => 480,
		'onversion_callback' => array(  
		array('MHAHNEFELD\FTC\Presets', 'update')
		),

		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
				//'pid' => 'index'
				
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                  => 1,
			'fields'                => array('name'),
			'flag'                  => 1,
		),
		'label' => array
		(
		    'fields'                  => array('id','name','description'),
		    'format'                  => '%s | %s : %s'
		),
		'global_operations' => array
		(
			
		
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset()"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
//				
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"'
//				
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		),
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),

		'default'                     => '{type_legend},name,preview,description;
		{use_legend},show_in_sections,use_as_default_for;{breakpoint_legend},small,medium,large,xlarge,xxlarge;
			{classes_legend},float_ftc,align,pull,push,custom;'
	),

	// Subpalettes
	'subpalettes' => array
	(
	
		//'protected'                   => 'groups'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),

//		'sorting' => array
//		(
//			'sql'                     => "int(10) unsigned NOT NULL default '0'"
//		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		//
//		'pid' => array
//		(
//			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['pid'],
//			'exclude'                 => true,
//			'inputType'               => 'text',	
//			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
//			'sql'                     => "varchar(32) NOT NULL default ''"
//		),
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['name'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>64,'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['description'],
			'exclude'                 => true,
			'inputType'               => 'textarea',	
			'eval'                    => array('tl_class'=>'clr long'),
			'sql'                     => "varchar(2000) NOT NULL default ''"
		),
		'preview' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['preview'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		//Mediaquery settings
		


		'small' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['small'],
					'default'                 => '12',
					'exclude'                 => true,
					 'sorting' 				  => true,
					'filter'                  => true,
					'inputType'               => 'select',
					'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
					'sql'                     => "char(8) NOT NULL default '12'"
				),
		'medium' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['medium'],
					'default'                 => '-',
					'exclude'                 => true,
					 'sorting' 				  => true,
					'filter'                  => true,
					'inputType'               => 'select',
					'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
					'sql'                     => "char(8) NOT NULL default '-'"
				),
		'large' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['large'],
						'default'                 => '-',
						'exclude'                 => true,
						 'sorting' 				  => true,
						'filter'                  => true,
						'inputType'               => 'select',
						'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
						'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
						'sql'                     => "char(8) NOT NULL default '-'"
					),
		'xlarge' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['xlarge'],
						'default'                 => '-',
						'exclude'                 => true,
						 'sorting' 				  => true,
						'filter'                  => true,
						'inputType'               => 'select',
						'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
						'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
						'sql'                     => "char(8) NOT NULL default '-'"
					),
		'xxlarge' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['xxlarge'],
						'default'                 => '12',
						'exclude'                 => true,
						 'sorting' 				  => true,
						'filter'                  => true,
						'inputType'               => 'select',
						'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
						'eval'                    => array('helpwizard'=>false, 'chosen'=>true,  'tl_class'=>'w50'),
						'sql'                     => "char(8) NOT NULL default '12'"
					),
	//floats & aligns								
	'float_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['float'],
				'exclude'                 => true,
				 'sorting' 				  => true,
				'filter'                  => true,
				'inputType'               => 'select',
				'options'				=>	array('-','left','right'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'tl_class'=>'w50 clr'),
				'sql'                     => "varchar(255) NOT NULL default '-'"
			),
   'align' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['align'],
   			'default'                 => '-',
   			'exclude'                 => true,
   			 'sorting' 				  => true,
   			'filter'                  => true,
   			'inputType'               => 'select',
   			'options_callback'        => array('ftcSettingsModel', 'getAlignOpitons'),
   			'reference'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['options'],
   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false,  'tl_class'=>'w50 m12'),
   			'sql'                     => "varchar(2000) NOT NULL default '-'"
   		),
   	'pull' => array
   			(
   				'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['pull'],
   				//'default'                 => '',
   				'exclude'                 => true,
   				 'sorting' 				  => true,
   				'filter'                  => true,
   				'inputType'               => 'select',
   				'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
   				
   				'eval'                    => array('multiple'=>false,'helpwizard'=>false, 'chosen'=>false, 'tl_class'=>'w50 m12'),
   				'sql'                     => "varchar(255) NOT NULL default '-'"
   			),
   	'push' => array
   			(
   				'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['push'],
   				//'default'                 => '',
   				'exclude'                 => true,
   				 'sorting' 				  => true,
   				'filter'                  => true,
   				'inputType'               => 'select',
   				'options_callback'        => array('ftcSettingsModel', 'getColOpitons'),
   				
   				'eval'                    => array('multiple'=>false,'helpwizard'=>false, 'chosen'=>false, 'tl_class'=>'w50 m12'),
   				'sql'                     => "varchar(255) NOT NULL default '-'"
   			),			
   		//custom css-classes
   	'custom' => array
   	(
   		'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['custom'],
   		'exclude'                 => true,
   		'inputType'               => 'text',	
   		'eval'                    => array('maxlength'=>255,'tl_class'=>'w50'),
   		'sql'                     => "varchar(255) NOT NULL default ''"
   	),
			   		
   	//select sections	
   
   'show_in_sections' => array
   				(
   					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['show_in_sections'],
   					'exclude'                 => true,
   					'inputType'               => 'checkbox',
   					'options'				=>array('layout','module','article','content','form_field'),
   					'reference'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['show_in_sections_options'],
   					'eval'                    => array('multiple'=>true,'tl_class'=>'w50 m12'),
   					'sql'                     => "varchar(255) NULL"
   				),
   	'use_as_default_for' => array
   					(
   						'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_presets']['use_as_default_for'],
   						'exclude'                 => true,
   						'inputType'               => 'checkbox',
   						'options'				=>array('module','article','content','form_field'),
   						'reference'               => &$GLOBALS['TL_LANG']['tl_ftc_presets']['use_as_default_for_options'],
   						'eval'                    => array('multiple'=>true,'tl_class'=>'w50 m12'),
   						'sql'                     => "varchar(255) NULL"
   					)	
			      

	)
);




/**
 * Class tl_ftc_presets
 *
 */
class tl_ftc_presets extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Return the link picker wizard
	 * @param \DataContainer
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}
	
		


}
	

?>