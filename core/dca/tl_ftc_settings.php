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
 * Table tl_ftc_settings
 */
$GLOBALS['TL_DCA']['tl_ftc_settings'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'Vwidth'            => 640,
		'Vheight'            => 480,
		'onversion_callback' => array(  
		array('MHAHNEFELD\FTC\Themes', 'generate')
		),

		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index'
				
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
		    'fields'                  => array('name','id'),
		    'format'                  => '%s | %s '
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
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_settings']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_settings']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_settings']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset()"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_settings']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
//				
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_ftc_settings']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"'
//				
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['tl_ftc_settings']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		),
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),

		'default'                     => '{type_legend},name,theme_folder;{color_legend},primary_color,secondary_color,alert_color,success_color,body_font_color,header_font_color;
		{typo_legend},text_direction,typografie,typografie_vars;
		{font_legend},icon_fonts,fonts;
		{grid_legend},cols,breakpoint,max_width,gap,radius;
		{components_legend},accordion,accordion_vars,
alert_boxes,alert_boxes_vars,
block_grid,block_grid_vars,
breadcrumbs,breadcrumbs_vars,
button_groups,button_groups_vars,
buttons,buttons_vars,
clearing,clearing_vars,
dropdown_buttons,dropdown_buttons_vars,
dropdown,dropdown_vars,
flex_video,flex_video_vars,
forms,forms_vars,
global,global_vars,
grid,grid_vars,
inline_lists,inline_lists_vars,
joyride,joyride_vars,
keystrokes,keystrokes_vars,
labels,labels_vars,
magellan,magellan_vars,
offcanvas,offcanvas_vars,
orbit,orbit_vars,
pagination,pagination_vars,
panels,panels_vars,
pricing_tables,pricing_tables_vars,
progress_bars,progress_bars_vars,
range_slider,range_slider_vars,
reveal,reveal_new,reveal_new_vars,
side_nav,side_nav_vars,
split_buttons,split_buttons_vars,
sub_nav,sub_nav_vars,
switch,switch_vars,
tables,tables_vars,
tabs,tabs_vars,
thumbs,thumbs_vars,
tooltips,tooltips_vars,
top_bar,top_bar_vars,
type,type_vars,
visibility,visibility_vars'
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

		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		//
		'pid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pid'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['name'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'theme_folder' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['theme_folder'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_ftc_settings', 'getTemplateFolders'),
			'eval'                    => array('includeBlankOption'=>true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		//colors
		'primary_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['primary_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['primary_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['primary_color']['pre_scss'],
			'exclude'                 => true,
			'default'            	=> '2ba6cb',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'secondary_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['secondary_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['secondary_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['secondary_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => 'e9e9e9',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'alert_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => 'c60f13',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'success_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['success_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['success_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['success_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => '5da423',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'body_font_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['body_font_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['body_font_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['body_font_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => '222222',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'header_font_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['header_font_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['header_font_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['header_font_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => '222222',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		//text
		'text_direction' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['text_direction'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['text_direction']['var_scss'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			'default'               => 'ltr',	
			'options'               => array('ltr','rtl'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_ftc_settings']['text_direction_options'],
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "char(16) NOT NULL default 'ltr'"
		),
		//fonts
		'icon_fonts' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['icon_fonts'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'icon_fonts' => array
		       (
		           'label'                 => &$GLOBALS['TL_LANG']['tl_ftc_settings']['icon_fonts'],
		           'exclude'               => true,
		           'inputType'             => 'multiColumnWizard',
		           'default' =>'chose your files',
		           'eval' => array
		           (
		               'tl_class'          => 'clr w50 ',
		               'columnFields' => array
		               (
		                 
		                   'src' => array
		                   (
		                       'label'     => &$GLOBALS['TL_LANG']['tl_ftc_settings']['icon_fonts_src']['src'],
		                       'inputType'               => 'fileTree',
		                       'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'tl_text_1'),
		                     
		                   )
		               ),
		           ),
		           'sql'                   => "blob NULL",
		       ),  
		'fonts' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['fonts'],
			'exclude'               => true,
		    'inputType'             => 'multiColumnWizard',
		    'default' =>'chose your files',
		    'eval' => array
		    (
		        'tl_class'          => 'w50 ',
		        'columnFields' => array
		        (
		          
		            'src' => array
		            (
		                'label'     => &$GLOBALS['TL_LANG']['tl_ftc_settings']['fonts_src']['src'],
		                'inputType'               => 'fileTree',
		                'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'tl_text_1'),
		              
		            )
		        ),
		    ),
		    'sql'                   => "blob NULL",
		), 
		//grid cols,breakpoint,max_width,gap,radius
		'cols' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['cols'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['cols']['var_scss'],
			'exclude'                 => true,
			'default'				=>'12',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'12','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'breakpoint' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breakpoint'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breakpoint']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breakpoint']['post_scss'],
			'exclude'                 => true,
			'default'				=>'58.75',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in em, e.g. 58.75','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'max_width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['max_width'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['max_width']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['max_width']['post_scss'],
			'exclude'                 => true,
			'default'				=>'62.5',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in em, e.g. 62.5','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		//text
		'gap' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['gap'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['gap']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['gap']['post_scss'],
			'exclude'                 => true,
			'default'				=>'1.875',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in em, e.g. 1.875','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		//fonts
		'radius' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['radius'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['radius']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['radius']['post_scss'],
			'exclude'                 => true,
			'default'				=>'3',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in px, e.g. 3','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		
		'typografie' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['typografie'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'typografie_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['typografie_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['typografie_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['typografie_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'
// TYPOGRAPHY
// $include-html-type-classes: $include-html-classes;
// We use these to control header font styles
// $header-font-family: $body-font-family;
// $header-font-weight: normal;
// $header-font-style: normal;
// $header-font-color: #222;
// $header-line-height: 1.4;
// $header-top-margin: .2rem;
// $header-bottom-margin: .5rem;
// $header-text-rendering: optimizeLegibility;

// We use these to control header font sizes
// $h1-font-size: rem-calc(44);
// $h2-font-size: rem-calc(37);
// $h3-font-size: rem-calc(27);
// $h4-font-size: rem-calc(23);
// $h5-font-size: rem-calc(18);
// $h6-font-size: 1rem;

// These control how subheaders are styled.
// $subheader-line-height: 1.4;
// $subheader-font-color: scale-color($header-font-color, $lightness: 35%);
// $subheader-font-weight: normal;
// $subheader-top-margin: .2rem;
// $subheader-bottom-margin: .5rem;

// A general <small> styling
// $small-font-size: 60%;
// $small-font-color: scale-color($header-font-color, $lightness: 35%);

// We use these to style paragraphs
// $paragraph-font-family: inherit;
// $paragraph-font-weight: normal;
// $paragraph-font-size: 1rem;
// $paragraph-line-height: 1.6;
// $paragraph-margin-bottom: rem-calc(20);
// $paragraph-aside-font-size: rem-calc(14);
// $paragraph-aside-line-height: 1.35;
// $paragraph-aside-font-style: italic;
// $paragraph-text-rendering: optimizeLegibility;

// We use these to style <code> tags
// $code-color: scale-color($alert-color, $lightness: -27%);
// $code-font-family: Consolas, "Liberation Mono", Courier, monospace;
// $code-font-weight: bold;

// We use these to style anchors
// $anchor-text-decoration: none;
// $anchor-text-decoration-hover: none;
// $anchor-font-color: $primary-color;
// $anchor-font-color-hover: scale-color($primary-color, $lightness: -14%);

// We use these to style the <hr> element
// $hr-border-width: 1px;
// $hr-border-style: solid;
// $hr-border-color: #ddd;
// $hr-margin: rem-calc(20);

// We use these to style lists
// $list-font-family: $paragraph-font-family;
// $list-font-size: $paragraph-font-size;
// $list-line-height: $paragraph-line-height;
// $list-margin-bottom: $paragraph-margin-bottom;
// $list-style-position: outside;
// $list-side-margin: 1.1rem;
// $list-ordered-side-margin: 1.4rem;
// $list-side-margin-no-bullet: 0;
// $list-nested-margin: rem-calc(20);
// $definition-list-header-weight: bold;
// $definition-list-header-margin-bottom: .3rem;
// $definition-list-margin-bottom: rem-calc(12);

// We use these to style blockquotes
// $blockquote-font-color: scale-color($header-font-color, $lightness: 35%);
// $blockquote-padding: rem-calc(9 20 0 19);
// $blockquote-border: 1px solid #ddd;
// $blockquote-cite-font-size: rem-calc(13);
// $blockquote-cite-font-color: scale-color($header-font-color, $lightness: 23%);
// $blockquote-cite-link-color: $blockquote-cite-font-color;

// Acronym styles
// $acronym-underline: 1px dotted #ddd;
// We use these to control padding and margin
// $microformat-padding: rem-calc(10 12);
// $microformat-margin: rem-calc(0 0 20 0);
// We use these to control the border styles
// $microformat-border-width: 1px;
// $microformat-border-style: solid;
// $microformat-border-color: #ddd;
// We use these to control full name font styles
// $microformat-fullname-font-weight: bold;
// $microformat-fullname-font-size: rem-calc(15);
// We use this to control the summary font styles
// $microformat-summary-font-weight: bold;
// We use this to control abbr padding
// $microformat-abbr-padding: rem-calc(0 1);
// We use this to control abbr font styles
// $microformat-abbr-font-weight: bold;
// $microformat-abbr-font-decoration: none;
',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>4000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),
		/*
		*
		*****
		 COMPONENTS
		*****
		*/
		'accordion' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['accordion'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'accordion_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['accordion_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['accordion_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['accordion_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Accordion
			// $include-html-accordion-classes: $include-html-classes;
			
			// $accordion-navigation-padding: rem-calc(16);
			// $accordion-navigation-bg-color: #efefef  ;
			// $accordion-navigation-hover-bg-color: scale-color($accordion-navigation-bg-color, $lightness: -5%);
			// $accordion-navigation-active-bg-color: scale-color($accordion-navigation-bg-color, $lightness: -3%);
			// $accordion-navigation-font-color: #222;
			// $accordion-navigation-font-size: rem-calc(16);
			// $accordion-navigation-font-family: $body-font-family;
			
			// $accordion-content-padding: $column-gutter/2;
			// $accordion-content-active-bg-color: #fff;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),
		'alert_boxes' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_boxes'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'alert_boxes_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_boxes_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_boxes_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['alert_boxes_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Alert Boxes
			// $include-html-alert-classes: $include-html-classes;
			
			// We use this to control alert padding.
			// $alert-padding-top: rem-calc(14);
			// $alert-padding-default-float: $alert-padding-top;
			// $alert-padding-opposite-direction: $alert-padding-top + rem-calc(10);
			// $alert-padding-bottom: $alert-padding-top;
			
			// We use these to control text style.
			// $alert-font-weight: normal;
			// $alert-font-size: rem-calc(13);
			// $alert-font-color: #fff;
			// $alert-font-color-alt: scale-color($secondary-color, $lightness: -66%);
			
			// We use this for close hover effect.
			// $alert-function-factor: -14%;
			
			// We use these to control border styles.
			// $alert-border-style: solid;
			// $alert-border-width: 1px;
			// $alert-border-color: scale-color($primary-color, $lightness: $alert-function-factor);
			// $alert-bottom-margin: rem-calc(20);
			
			// We use these to style the close buttons
			// $alert-close-color: #333;
			// $alert-close-top: 50%;
			// $alert-close-position: rem-calc(4);
			// $alert-close-font-size: rem-calc(22);
			// $alert-close-opacity: 0.3;
			// $alert-close-opacity-hover: 0.5;
			// $alert-close-padding: 9px 6px 4px;
			
			// We use this to control border radius
			// $alert-radius: $global-radius;
			
			// We use this to control transition effects
			// $alert-transition-speed: 300ms;
			// $alert-transition-ease: ease-out;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'block_grid' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'block_grid_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Block Grid
			// $include-html-grid-classes: $include-html-classes;
			// $include-xl-html-block-grid-classes: false;
			
			// We use this to control the maximum number of block grid elements per row
			// $block-grid-elements: 12;
			// $block-grid-default-spacing: rem-calc(20);
			// $align-block-grid-to-grid: false;
			
			// Enables media queries for block-grid classes. Set to false if writing semantic HTML.
			// $block-grid-media-queries: true;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'breadcrumbs' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breadcrumbs'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'breadcrumbs_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breadcrumbs_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breadcrumbs_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['breadcrumbs_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Breadcrumbs
			// $include-html-nav-classes: $include-html-classes;
			
			// We use this to set the background color for the breadcrumb container.
			// $crumb-bg: scale-color($secondary-color, $lightness: 55%);
			
			// We use these to set the padding around the breadcrumbs.
			// $crumb-padding: rem-calc(9 14 9);
			// $crumb-side-padding: rem-calc(12);
			
			// We use these to control border styles.
			// $crumb-function-factor: -10%;
			// $crumb-border-size: 1px;
			// $crumb-border-style: solid;
			// $crumb-border-color: scale-color($crumb-bg, $lightness: $crumb-function-factor);
			// $crumb-radius: $global-radius;
			
			// We use these to set various text styles for breadcrumbs.
			// $crumb-font-size: rem-calc(11);
			// $crumb-font-color: $primary-color;
			// $crumb-font-color-current: #333;
			// $crumb-font-color-unavailable: #999;
			// $crumb-font-transform: uppercase;
			// $crumb-link-decor: underline;
			
			// We use these to control the slash between breadcrumbs
			// $crumb-slash-color: #aaa;
			// $crumb-slash: "/";',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'button_groups' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['button_groups'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'button_groups_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['button_groups_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['button_groups_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['button_groups_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Button Groups
			// $include-html-button-classes: $include-html-classes;
			
			// Sets the margin for the right side by default, and the left margin if right-to-left direction is used
			// $button-bar-margin-opposite: rem-calc(10);
			// $button-group-border-width: 1px;
			
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'buttons' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['buttons'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'buttons_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['buttons_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['buttons_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['buttons_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// BUTTONS
			// $include-html-button-classes: $include-html-classes;
			
			// We use these to build padding for buttons.
			// $button-tny: rem-calc(10);
			// $button-sml: rem-calc(14);
			// $button-med: rem-calc(16);
			// $button-lrg: rem-calc(18);
			
			// We use this to control the display property.
			// $button-display: inline-block;
			// $button-margin-bottom: rem-calc(20);
			
			// We use these to control button text styles.
			// $button-font-family: $body-font-family;
			// $button-font-color: #fff;
			// $button-font-color-alt: #333;
			// $button-font-tny: rem-calc(11);
			// $button-font-sml: rem-calc(13);
			// $button-font-med: rem-calc(16);
			// $button-font-lrg: rem-calc(20);
			// $button-font-weight: normal;
			// $button-font-align: center;
			
			// We use these to control various hover effects.
			// $button-function-factor: -20%;
			
			// We use these to control button border styles.
			// $button-border-width: 0px;
			// $button-border-style: solid;
			// $button-bg: $primary-color;
			// $button-border-color: scale-color($bg, $lightness: $button-function-factor);
			
			// We use this to set the default radius used throughout the core.
			// $button-radius: $global-radius;
			// $button-round: $global-rounded;
			
			// We use this to set default opacity for disabled buttons.
			// $button-disabled-opacity: 0.7;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'clearing' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['clearing'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'clearing_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['clearing_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['clearing_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['clearing_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Clearing
			// $include-html-clearing-classes: $include-html-classes;
			
			// We use these to set the background colors for parts of Clearing.
			// $clearing-bg: #333;
			// $clearing-caption-bg: $clearing-bg;
			// $clearing-carousel-bg: rgba(51,51,51,0.8);
			// $clearing-img-bg: $clearing-bg;
			
			// We use these to style the close button
			// $clearing-close-color: #ccc;
			// $clearing-close-size: 30px;
			
			// We use these to style the arrows
			// $clearing-arrow-size: 12px;
			// $clearing-arrow-color: $clearing-close-color;
			
			// We use these to style captions
			// $clearing-caption-font-color: #ccc;
			// $clearing-caption-font-size: 0.875em;
			// $clearing-caption-padding: 10px 30px 20px;
			
			// We use these to make the image and carousel height and style
			// $clearing-active-img-height: 85%;
			// $clearing-carousel-height: 120px;
			// $clearing-carousel-thumb-width: 120px;
			// $clearing-carousel-thumb-active-border: 1px solid rgb(255,255,255);',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'dropdown_buttons' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_buttons'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'dropdown_buttons_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_buttons_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_buttons_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_buttons_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Dropdown Buttons
			// $include-html-button-classes: $include-html-classes;
			
			// We use these to set the color of the pip in dropdown buttons
			// $dropdown-button-pip-color: #fff;
			// $dropdown-button-pip-color-alt: #333;
			
			// $button-pip-tny: rem-calc(6);
			// $button-pip-sml: rem-calc(7);
			// $button-pip-med: rem-calc(9);
			// $button-pip-lrg: rem-calc(11);
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'dropdown' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'dropdown_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['dropdown_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Dropdown
			// $include-html-dropdown-classes: $include-html-classes;
			
			// We use these to controls height and width styles.
			// $f-dropdown-max-width: 200px;
			// $f-dropdown-height: auto;
			// $f-dropdown-max-height: none;
			
			// Used for bottom position
			// $f-dropdown-margin-top: 2px;
			
			// Used for right position
			// $f-dropdown-margin-left: $f-dropdown-margin-top;
			
			// Used for left position
			// $f-dropdown-margin-right: $f-dropdown-margin-top;
			
			// Used for top position
			// $f-dropdown-margin-bottom: $f-dropdown-margin-top;
			
			// We use this to control the background color
			// $f-dropdown-bg: #fff;
			
			// We use this to set the border styles for dropdowns.
			// $f-dropdown-border-style: solid;
			// $f-dropdown-border-width: 1px;
			// $f-dropdown-border-color: scale-color(#fff, $lightness: -20%);
			
			// We use these to style the triangle pip.
			// $f-dropdown-triangle-size: 6px;
			// $f-dropdown-triangle-color: #fff;
			// $f-dropdown-triangle-side-offset: 10px;
			
			// We use these to control styles for the list elements.
			// $f-dropdown-list-style: none;
			// $f-dropdown-font-color: #555;
			// $f-dropdown-font-size: rem-calc(14);
			// $f-dropdown-list-padding: rem-calc(5, 10);
			// $f-dropdown-line-height: rem-calc(18);
			// $f-dropdown-list-hover-bg: #eeeeee  ;
			// $dropdown-mobile-default-float: 0;
			
			// We use this to control the styles for when the dropdown has custom content.
			// $f-dropdown-content-padding: rem-calc(20);',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'flex_video' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['flex_video'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'flex_video_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['flex_video_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['flex_video_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['flex_video_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Flex Video
			// $include-html-media-classes: $include-html-classes;
			
			// We use these to control video container padding and margins
			// $flex-video-padding-top: rem-calc(25);
			// $flex-video-padding-bottom: 67.5%;
			// $flex-video-margin-bottom: rem-calc(16);
			
			// We use this to control widescreen bottom padding
			// $flex-video-widescreen-padding-bottom: 56.34%;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),			
		'forms' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['forms'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'forms_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['forms_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['forms_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['forms_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Forms
			// $include-html-form-classes: $include-html-classes;
			
			// We use this to set the base for lots of form spacing and positioning styles
			// $form-spacing: rem-calc(16);
			
			// We use these to style the labels in different ways
			// $form-label-pointer: pointer;
			// $form-label-font-size: rem-calc(14);
			// $form-label-font-weight: normal;
			// $form-label-line-height: 1.5;
			// $form-label-font-color: scale-color(#000, $lightness: 30%);
			// $form-label-small-transform: capitalize;
			// $form-label-bottom-margin: 0;
			// $input-font-family: inherit;
			// $input-font-color: rgba(0,0,0,0.75);
			// $input-font-size: rem-calc(14);
			// $input-bg-color: #fff;
			// $input-focus-bg-color: scale-color(#fff, $lightness: -2%);
			// $input-border-color: scale-color(#fff, $lightness: -20%);
			// $input-focus-border-color: scale-color(#fff, $lightness: -40%);
			// $input-border-style: solid;
			// $input-border-width: 1px;
			// $input-border-radius: $global-radius;
			// $input-disabled-bg: #ddd;
			// $input-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
			// $input-include-glowing-effect: true;
			
			// We use these to style the fieldset border and spacing.
			// $fieldset-border-style: solid;
			// $fieldset-border-width: 1px;
			// $fieldset-border-color: #ddd;
			// $fieldset-padding: rem-calc(20);
			// $fieldset-margin: rem-calc(18 0);
			
			// We use these to style the legends when you use them
			// $legend-bg: #fff;
			// $legend-font-weight: bold;
			// $legend-padding: rem-calc(0 3);
			
			// We use these to style the prefix and postfix input elements
			// $input-prefix-bg: scale-color(#fff, $lightness: -5%);
			// $input-prefix-border-color: scale-color(#fff, $lightness: -20%);
			// $input-prefix-border-size: 1px;
			// $input-prefix-border-type: solid;
			// $input-prefix-overflow: hidden;
			// $input-prefix-font-color: #333;
			// $input-prefix-font-color-alt: #fff;
			
			// We use these to style the error states for inputs and labels
			// $input-error-message-padding: rem-calc(6 9 9);
			// $input-error-message-top: -1px;
			// $input-error-message-font-size: rem-calc(12);
			// $input-error-message-font-weight: normal;
			// $input-error-message-font-style: italic;
			// $input-error-message-font-color: #fff;
			// $input-error-message-font-color-alt: #333;
			
			// We use this to style the glowing effect of inputs when focused
			// $glowing-effect-fade-time: 0.45s;
			// $glowing-effect-color: $input-focus-border-color;
			
			// Select variables
			// $select-bg-color: #fafafa;
			// $select-hover-bg-color: scale-color($select-bg-color, $lightness: -3%);',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),
		'global' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['global'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'global_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['global_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['global_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['global_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'
// Global
// We use these to control various global styles
// $body-bg: #fff;
// $body-font-color: #222;
// $body-font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
// $body-font-weight: normal;
// $body-font-style: normal;

// We use this to control font-smoothing
// $font-smoothing: antialiased;

// We use these to control text direction settings
// $text-direction: ltr;
// $opposite-direction: right;
// $default-float: left;

// We use these as default colors throughout
// $primary-color: #008CBA;
// $secondary-color: #e7e7e7;
// $alert-color: #f04124;
// $success-color: #43AC6A;
// $warning-color: #f08a24;
// $info-color: #a0d3e8;

// We use these to make sure border radius matches unless we want it different.
// $global-radius: 3px;
// $global-rounded: 1000px;

// We use these to control inset shadow shiny edges and depressions.
// $shiny-edge-size: 0 1px 0;
// $shiny-edge-color: rgba(#fff, .5);
// $shiny-edge-active-color: rgba(#000, .2);

// $column-gutter: rem-calc(30);

// Media Query Ranges
// $small-range: (0em, 40em);
// $medium-range: (40.063em, 64em);
// $large-range: (64.063em, 90em);
// $xlarge-range: (90.063em, 120em);
// $xxlarge-range: (120.063em, 99999999em);

// $screen: "only screen";

// $landscape: "#{$screen} and (orientation: landscape)";
// $portrait: "#{$screen} and (orientation: portrait)";

// $small-up: $screen;
// $small-only: "#{$screen} and (max-width: #{upper-bound($small-range)})";

// $medium-up: "#{$screen} and (min-width:#{lower-bound($medium-range)})";
// $medium-only: "#{$screen} and (min-width:#{lower-bound($medium-range)}) and (max-width:#{upper-bound($medium-range)})";

// $large-up: "#{$screen} and (min-width:#{lower-bound($large-range)})";
// $large-only: "#{$screen} and (min-width:#{lower-bound($large-range)}) and (max-width:#{upper-bound($large-range)})";

// $xlarge-up: "#{$screen} and (min-width:#{lower-bound($xlarge-range)})";
// $xlarge-only: "#{$screen} and (min-width:#{lower-bound($xlarge-range)}) and (max-width:#{upper-bound($xlarge-range)})";

// $xxlarge-up: "#{$screen} and (min-width:#{lower-bound($xxlarge-range)})";
// $xxlarge-only: "#{$screen} and (min-width:#{lower-bound($xxlarge-range)}) and (max-width:#{upper-bound($xxlarge-range)})";

// Legacy
// $small: $medium-up;
// $medium: $medium-up;
// $large: $large-up;

//We use this as cursors values for enabling the option of having custom cursors in the whole sites stylesheet
// $cursor-crosshair-value: crosshair;
// $cursor-default-value: default;
// $cursor-pointer-value: pointer;
// $cursor-help-value: help;
// $cursor-text-value: text;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>4000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'block_grid' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'block_grid_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['block_grid_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>' ',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'grid' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['grid'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'grid_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['grid_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['grid_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['grid_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>' ',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'inline_lists' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['inline_lists'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'inline_lists_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['inline_lists_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['inline_lists_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['inline_lists_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Inline Lists
			// $include-html-inline-list-classes: $include-html-classes;
			
			// We use this to control the margins and padding of the inline list.
			// $inline-list-top-margin: 0;
			// $inline-list-opposite-margin: 0;
			// $inline-list-bottom-margin: rem-calc(17);
			// $inline-list-default-float-margin: rem-calc(-22);
			// $inline-list-default-float-list-margin: rem-calc(22);
			
			// $inline-list-padding: 0;
			
			// We use this to control the overflow of the inline list.
			// $inline-list-overflow: hidden;
			
			// We use this to control the list items
			// $inline-list-display: block;
			
			// We use this to control any elments within list items
			// $inline-list-children-display: block;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'joyride' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['joyride'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'joyride_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['joyride_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['joyride_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['joyride_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Joyride
			// $include-html-joyride-classes: $include-html-classes;
			
			// Controlling default Joyride styles
			// $joyride-tip-bg: #333;
			// $joyride-tip-default-width: 300px;
			// $joyride-tip-padding: rem-calc(18 20 24);
			// $joyride-tip-border: solid 1px #555;
			// $joyride-tip-radius: 4px;
			// $joyride-tip-position-offset: 22px;
			
			// Here, we are setting the tip dont styles
			// $joyride-tip-font-color: #fff;
			// $joyride-tip-font-size: rem-calc(14);
			// $joyride-tip-header-weight: bold;
			
			// This changes the nub size
			// $joyride-tip-nub-size: 10px;
			
			// This adjusts the styles for the timer when its enabled
			// $joyride-tip-timer-width: 50px;
			// $joyride-tip-timer-height: 3px;
			// $joyride-tip-timer-color: #666;
			
			// This changes up the styles for the close button
			// $joyride-tip-close-color: #777;
			// $joyride-tip-close-size: 24px;
			// $joyride-tip-close-weight: normal;
			
			// When Joyride is filling the screen, we use this style for the bg
			// $joyride-screenfill: rgba(0,0,0,0.5);',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'keystrokes' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['keystrokes'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'keystrokes_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['keystrokes_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['keystrokes_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['keystrokes_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Keystrokes
			// $include-html-keystroke-classes: $include-html-classes;
			
			// We use these to control text styles.
			// $keystroke-font: "Consolas", "Menlo", "Courier", monospace;
			// $keystroke-font-size: inherit;
			// $keystroke-font-color: #222;
			// $keystroke-font-color-alt: #fff;
			// $keystroke-function-factor: -7%;
			
			// We use this to control keystroke padding.
			// $keystroke-padding: rem-calc(2 4 0);
			
			// We use these to control background and border styles.
			// $keystroke-bg: scale-color(#fff, $lightness: $keystroke-function-factor);
			// $keystroke-border-style: solid;
			// $keystroke-border-width: 1px;
			// $keystroke-border-color: scale-color($keystroke-bg, $lightness: $keystroke-function-factor);
			// $keystroke-radius: $global-radius;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'labels' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['labels'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'labels_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['labels_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['labels_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['labels_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Labels
			// $include-html-label-classes: $include-html-classes;
			
			// We use these to style the labels
			// $label-padding: rem-calc(4 8 6);
			// $label-radius: $global-radius;
			
			// We use these to style the label text
			// $label-font-sizing: rem-calc(11);
			// $label-font-weight: normal;
			// $label-font-color: #333;
			// $label-font-color-alt: #fff;
			// $label-font-family: $body-font-family;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'magellan' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['magellan'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'magellan_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['magellan_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['magellan_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['magellan_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Magellan
			// $include-html-magellan-classes: $include-html-classes;
			
			// $magellan-bg: #fff;
			// $magellan-padding: 10px;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'offcanvas' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['offcanvas'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'offcanvas_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['offcanvas_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['offcanvas_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['offcanvas_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Off-canvas
			// $include-html-off-canvas-classes: $include-html-classes;
			
			// $tabbar-bg: #333;
			// $tabbar-height: rem-calc(45);
			// $tabbar-line-height: $tabbar-height;
			// $tabbar-color: #fff;
			// $tabbar-middle-padding: 0 rem-calc(10);
			
			// Off Canvas Divider Styles
			// $tabbar-right-section-border: solid 1px scale-color($tabbar-bg, $lightness: 13%);
			// $tabbar-left-section-border: solid 1px scale-color($tabbar-bg, $lightness: -50%);
			
			// Off Canvas Tab Bar Headers
			// $tabbar-header-color: #fff;
			// $tabbar-header-weight: bold;
			// $tabbar-header-line-height: $tabbar-height;
			// $tabbar-header-margin: 0;
			
			// Off Canvas Menu Variables
			// $off-canvas-width: rem-calc(250);
			// $off-canvas-bg: #333;
			
			// Off Canvas Menu List Variables
			// $off-canvas-label-padding: 0.3rem rem-calc(15);
			// $off-canvas-label-color: #999;
			// $off-canvas-label-text-transform: uppercase;
			// $off-canvas-label-font-weight: bold;
			// $off-canvas-label-bg: #444;
			// $off-canvas-label-border-top: 1px solid scale-color(#444, $lightness: 14%);
			// $off-canvas-label-border-bottom: none;
			// $off-canvas-label-margin:0;
			// $off-canvas-link-padding: rem-calc(10, 15);
			// $off-canvas-link-color: rgba(#fff, 0.7);
			// $off-canvas-link-border-bottom: 1px solid scale-color($off-canvas-bg, $lightness: -25%);
			
			// Off Canvas Menu Icon Variables
			// $tabbar-menu-icon-color: #fff;
			// $tabbar-menu-icon-hover: scale-color($tabbar-menu-icon-color, $lightness: -30%);
			
			// $tabbar-menu-icon-text-indent: rem-calc(35);
			// $tabbar-menu-icon-width: $tabbar-height;
			// $tabbar-menu-icon-height: $tabbar-height;
			// $tabbar-menu-icon-line-height: rem-calc(33);
			// $tabbar-menu-icon-padding: 0;
			
			// $tabbar-hamburger-icon-width: rem-calc(16);
			// $tabbar-hamburger-icon-left: false;
			// $tabbar-hamburger-icon-top: false;
			// $tapbar-hamburger-icon-thickness: 1px;
			// $tapbar-hamburger-icon-gap: 6px;
			
			// Off Canvas Back-Link Overlay
			// $off-canvas-overlay-transition: background 300ms ease;
			// $off-canvas-overlay-cursor: pointer;
			// $off-canvas-overlay-box-shadow: -4px 0 4px rgba(#000, 0.5), 4px 0 4px rgba(#000, 0.5);
			// $off-canvas-overlay-background: rgba(#fff, 0.2);
			// $off-canvas-overlay-background-hover: rgba(#fff, 0.05);
			
			// Transition Variables
			// $menu-slide: "transform 500ms ease";
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),			
		'orbit' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['orbit'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'orbit_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['orbit_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['orbit_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['orbit_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Orbit
			// $include-html-orbit-classes: $include-html-classes;
			
			// We use these to control the caption styles
			// $orbit-container-bg: none;
			// $orbit-caption-bg: rgba(51,51,51, 0.8);
			// $orbit-caption-font-color: #fff;
			// $orbit-caption-font-size: rem-calc(14);
			// $orbit-caption-position: "bottom"; // Supported values: "bottom", "under"
			// $orbit-caption-padding: rem-calc(10 14);
			// $orbit-caption-height: auto;
			
			// We use these to control the left/right nav styles
			// $orbit-nav-bg: transparent;
			// $orbit-nav-bg-hover: rgba(0,0,0,0.3);
			// $orbit-nav-arrow-color: #fff;
			// $orbit-nav-arrow-color-hover: #fff;
			
			// We use these to control the timer styles
			// $orbit-timer-bg: rgba(255,255,255,0.3);
			// $orbit-timer-show-progress-bar: true;
			
			// We use these to control the bullet nav styles
			// $orbit-bullet-nav-color: #ccc;
			// $orbit-bullet-nav-color-active: #999;
			// $orbit-bullet-radius: rem-calc(9);
			
			// We use these to controls the style of slide numbers
			// $orbit-slide-number-bg: rgba(0,0,0,0);
			// $orbit-slide-number-font-color: #fff;
			// $orbit-slide-number-padding: rem-calc(5);
			
			// We use these to controls the css animation
			// $orbit-animation-speed: 500ms;
			// $orbit-animation-ease: ease-in-out;
			
			// Hide controls on small
			// $orbit-nav-hide-for-small: true;
			// $orbit-bullet-hide-for-small: true;
			// $orbit-timer-hide-for-small: true;
			
			// Graceful Loading Wrapper and preloader
			// $wrapper-class: "slideshow-wrapper";
			// $preloader-class: "preloader";',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),
		'pagination' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pagination'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'pagination_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pagination_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pagination_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pagination_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Pagination
			// $include-pagination-classes: $include-html-classes;
			
			// We use these to control the pagination container
			// $pagination-height: rem-calc(24);
			// $pagination-margin: rem-calc(-5);
			
			// We use these to set the list-item properties
			// $pagination-li-float: $default-float;
			// $pagination-li-height: rem-calc(24);
			// $pagination-li-font-color: #222;
			// $pagination-li-font-size: rem-calc(14);
			// $pagination-li-margin: rem-calc(5);
			
			// We use these for the pagination anchor links
			// $pagination-link-pad: rem-calc(1 10 1);
			// $pagination-link-font-color: #999;
			// $pagination-link-active-bg: scale-color(#fff, $lightness: -10%);
			
			// We use these for disabled anchor links
			// $pagination-link-unavailable-cursor: default;
			// $pagination-link-unavailable-font-color: #999;
			// $pagination-link-unavailable-bg-active: transparent;
			
			// We use these for currently selected anchor links
			// $pagination-link-current-background: $primary-color;
			// $pagination-link-current-font-color: #fff;
			// $pagination-link-current-font-weight: bold;
			// $pagination-link-current-cursor: default;
			// $pagination-link-current-active-bg: $primary-color;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'panels' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['panels'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'panels_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['panels_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['panels_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['panels_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Panels
			// $include-html-panel-classes: $include-html-classes;
			
			// We use these to control the background and border styles
			// $panel-bg: scale-color(#fff, $lightness: -5%);
			// $panel-border-style: solid;
			// $panel-border-size: 1px;
			
			// We use this % to control how much we darken things on hover
			// $panel-function-factor: -11%;
			// $panel-border-color: scale-color($panel-bg, $lightness: $panel-function-factor);
			
			// We use these to set default inner padding and bottom margin
			// $panel-margin-bottom: rem-calc(20);
			// $panel-padding: rem-calc(20);
			
			// We use these to set default font colors
			// $panel-font-color: #333;
			// $panel-font-color-alt: #fff;
			
			// $panel-header-adjust: true;
			// $callout-panel-link-color: $primary-color;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'pricing_tables' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pricing_tables'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'pricing_tables_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pricing_tables_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pricing_tables_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['pricing_tables_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Pricing Tables
			// $include-html-pricing-classes: $include-html-classes;
			
			// We use this to control the border color
			// $price-table-border: solid 1px #ddd;
			
			// We use this to control the bottom margin of the pricing table
			// $price-table-margin-bottom: rem-calc(20);
			
			// We use these to control the title styles
			// $price-title-bg: #333;
			// $price-title-padding: rem-calc(15 20);
			// $price-title-align: center;
			// $price-title-color: #eee;
			// $price-title-weight: normal;
			// $price-title-size: rem-calc(16);
			// $price-title-font-family: $body-font-family;
			
			// We use these to control the price styles
			// $price-money-bg: #f6f6f6  ;
			// $price-money-padding: rem-calc(15 20);
			// $price-money-align: center;
			// $price-money-color: #333;
			// $price-money-weight: normal;
			// $price-money-size: rem-calc(32);
			// $price-money-font-family: $body-font-family;
			
			// We use these to control the description styles
			// $price-bg: #fff;
			// $price-desc-color: #777;
			// $price-desc-padding: rem-calc(15);
			// $price-desc-align: center;
			// $price-desc-font-size: rem-calc(12);
			// $price-desc-weight: normal;
			// $price-desc-line-height: 1.4;
			// $price-desc-bottom-border: dotted 1px #ddd;
			
			// We use these to control the list item styles
			// $price-item-color: #333;
			// $price-item-padding: rem-calc(15);
			// $price-item-align: center;
			// $price-item-font-size: rem-calc(14);
			// $price-item-weight: normal;
			// $price-item-bottom-border: dotted 1px #ddd;
			
			// We use these to control the CTA area styles
			// $price-cta-bg: #fff;
			// $price-cta-align: center;
			// $price-cta-padding: rem-calc(20 20 0);',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'progress_bars' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['progress_bars'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'progress_bars_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['progress_bars_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['progress_bars_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['progress_bars_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Progress Bar
			// $include-html-media-classes: $include-html-classes;
			
			// We use this to set the progress bar height
			// $progress-bar-height: rem-calc(25);
			// $progress-bar-color: #f6f6f6  ;
			
			// We use these to control the border styles
			// $progress-bar-border-color: scale-color(#fff, $lightness: 20%);
			// $progress-bar-border-size: 1px;
			// $progress-bar-border-style: solid;
			// $progress-bar-border-radius: $global-radius;
			
			// We use these to control the margin & padding
			// $progress-bar-pad: rem-calc(2);
			// $progress-bar-margin-bottom: rem-calc(10);
			
			// We use these to set the meter colors
			// $progress-meter-color: $primary-color;
			// $progress-meter-secondary-color: $secondary-color;
			// $progress-meter-success-color: $success-color;
			// $progress-meter-alert-color: $alert-color;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'range_slider' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['range_slider'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'range_slider_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['range_slider_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['range_slider_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['range_slider_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// RANGE SLIDER
			// $include-html-range-slider-classes: $include-html-classes;
			
			// These variabels define the slider bar styles
			// $range-slider-bar-width: 100%;
			// $range-slider-bar-height: rem-calc(16);
			
			// $range-slider-bar-border-width: 1px;
			// $range-slider-bar-border-style: solid;
			// $range-slider-bar-border-color: #ddd;
			// $range-slider-radius: $global-radius;
			// $range-slider-round: $global-rounded;
			// $range-slider-bar-bg-color: #fafafa;
			
			// Vertical bar styles
			// $range-slider-vertical-bar-width: rem-calc(16);
			// $range-slider-vertical-bar-height: rem-calc(200);
			
			// These variabels define the slider handle styles
			// $range-slider-handle-width: rem-calc(32);
			// $range-slider-handle-height: rem-calc(22);
			// $range-slider-handle-position-top: rem-calc(-5);
			// $range-slider-handle-bg-color: $primary-color;
			// $range-slider-handle-border-width: 1px;
			// $range-slider-handle-border-style: solid;
			// $range-slider-handle-border-color: none;
			// $range-slider-handle-radius: $global-radius;
			// $range-slider-handle-round: $global-rounded;
			// $range-slider-handle-bg-hover-color: scale-color($primary-color, $lightness: -12%);
			// $range-slider-handle-cursor: pointer;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'reveal' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'reveal_new' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_new'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'reveal_new_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_new_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_new_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_new_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Reveal
			// $include-html-reveal-classes: $include-html-classes;
			
			// We use these to control the style of the reveal overlay.
			// $reveal-overlay-bg: rgba(#000, .45);
			// $reveal-overlay-bg-old: #000;
			
			// We use these to control the style of the modal itself.
			// $reveal-modal-bg: #fff;
			// $reveal-position-top: rem-calc(100);
			// $reveal-default-width: 80%;
			// $reveal-modal-padding: rem-calc(20);
			// $reveal-box-shadow: 0 0 10px rgba(#000,.4);
			
			// We use these to style the reveal close button
			// $reveal-close-font-size: rem-calc(40);
			// $reveal-close-top: rem-calc(8);
			// $reveal-close-side: rem-calc(11);
			// $reveal-close-color: #aaa;
			// $reveal-close-weight: bold;
			
			// We use this to set the default radius used throughout the core.
			// $reveal-radius: $global-radius;
			// $reveal-round: $global-rounded;
			
			// We use these to control the modal border
			// $reveal-border-style: solid;
			// $reveal-border-width: 1px;
			// $reveal-border-color: #666;
			
			// $reveal-modal-class: "reveal-modal";
			// $close-reveal-modal-class: "close-reveal-modal";',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'reveal' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'reveal_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['reveal_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>' ',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'side_nav' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['side_nav'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'side_nav_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['side_nav_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['side_nav_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['side_nav_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Side Nav
			// $include-html-nav-classes: $include-html-classes;
			
			// We use this to control padding.
			// $side-nav-padding: rem-calc(14 0);
			
			// We use these to control list styles.
			// $side-nav-list-type: none;
			// $side-nav-list-position: inside;
			// $side-nav-list-margin: rem-calc(0 0 7 0);
			
			// We use these to control link styles.
			// $side-nav-link-color: $primary-color;
			// $side-nav-link-color-active: scale-color($side-nav-link-color, $lightness: 30%);
			// $side-nav-link-color-hover: scale-color($side-nav-link-color, $lightness: 30%);
			// $side-nav-font-size: rem-calc(14);
			// $side-nav-font-weight: normal;
			// $side-nav-font-weight-active: $side-nav-font-weight;
			// $side-nav-font-family: $body-font-family;
			// $side-nav-active-font-family: $side-nav-font-family;

			// We use these to control border styles
			// $side-nav-divider-size: 1px;
			// $side-nav-divider-style: solid;
			// $side-nav-divider-color: scale-color(#fff, $lightness: 10%);
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'split_buttons' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['split_buttons'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'split_buttons_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['split_buttons_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['split_buttons_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['split_buttons_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Split Buttons
			// $include-html-button-classes: $include-html-classes;
			
			// We use these to control different shared styles for Split Buttons
			// $split-button-function-factor: 10%;
			// $split-button-pip-color: #fff;
			// $split-button-pip-color-alt: #333;
			// $split-button-active-bg-tint: rgba(0,0,0,0.1);
			
			// We use these to control tiny split buttons
			// $split-button-padding-tny: $button-pip-tny * 10;
			// $split-button-span-width-tny: $button-pip-tny * 6;
			// $split-button-pip-size-tny: $button-pip-tny;
			// $split-button-pip-top-tny: $button-pip-tny * 2;
			// $split-button-pip-default-float-tny: rem-calc(-6);
			
			// We use these to control small split buttons
			// $split-button-padding-sml: $button-pip-sml * 10;
			// $split-button-span-width-sml: $button-pip-sml * 6;
			// $split-button-pip-size-sml: $button-pip-sml;
			// $split-button-pip-top-sml: $button-pip-sml * 1.5;
			// $split-button-pip-default-float-sml: rem-calc(-6);
			
			// We use these to control medium split buttons
			// $split-button-padding-med: $button-pip-med * 9;
			// $split-button-span-width-med: $button-pip-med * 5.5;
			// $split-button-pip-size-med: $button-pip-med - rem-calc(3);
			// $split-button-pip-top-med: $button-pip-med * 1.5;
			// $split-button-pip-default-float-med: rem-calc(-6);
			
			// We use these to control large split buttons
			// $split-button-padding-lrg: $button-pip-lrg * 8;
			// $split-button-span-width-lrg: $button-pip-lrg * 5;
			// $split-button-pip-size-lrg: $button-pip-lrg - rem-calc(6);
			// $split-button-pip-top-lrg: $button-pip-lrg + rem-calc(5);
			// $split-button-pip-default-float-lrg: rem-calc(-6);
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),			
		'sub_nav' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['sub_nav'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'sub_nav_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['sub_nav_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['sub_nav_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['sub_nav_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Sub Nav
			// $include-html-nav-classes: $include-html-classes;
			
			// We use these to control margin and padding
			// $sub-nav-list-margin: rem-calc(-4 0 18);
			// $sub-nav-list-padding-top: rem-calc(4);
			
			// We use this to control the definition
			// $sub-nav-font-family: $body-font-family;
			// $sub-nav-font-size: rem-calc(14);
			// $sub-nav-font-color: #999;
			// $sub-nav-font-weight: normal;
			// $sub-nav-text-decoration: none;
			// $sub-nav-padding: rem-calc(3 16);
			// $sub-nav-border-radius: 3px;
			// $sub-nav-font-color-hover: scale-color($sub-nav-font-color, $lightness: -25%);
			
			// We use these to control the active item styles
			// $sub-nav-active-font-weight: normal;
			// $sub-nav-active-bg: $primary-color;
			// $sub-nav-active-bg-hover: scale-color($sub-nav-active-bg, $lightness: -14%);
			// $sub-nav-active-color: #fff;
			// $sub-nav-active-padding: $sub-nav-padding;
			// $sub-nav-active-cursor: default;
			
			// $sub-nav-item-divider: "";
			// $sub-nav-item-divider-margin: rem-calc(12);',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),
		'switch' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['switch'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'switch_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['switch_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['switch_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['switch_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// SWITCH
			// $include-html-form-classes: $include-html-classes;
			
			// Controlling border styles and background colors for the switch container
			// $switch-border-color: scale-color(#fff, $lightness: -20%);
			// $switch-border-style: solid;
			// $switch-border-width: 1px;
			// $switch-bg: #fff;
			
			// We use these to control the switch heights for our default classes
			// $switch-height-tny: 22px;
			// $switch-height-sml: 28px;
			// $switch-height-med: 36px;
			// $switch-height-lrg: 44px;
			// $switch-bottom-margin: rem-calc(20);
			
			// We use these to control default font sizes for our classes.
			// $switch-font-size-tny: 11px;
			// $switch-font-size-sml: 12px;
			// $switch-font-size-med: 14px;
			// $switch-font-size-lrg: 17px;
			// $switch-label-side-padding: 6px;
			
			// We use these to style the switch-paddle
			// $switch-paddle-bg: #fff;
			// $switch-paddle-fade-to-color: scale-color($switch-paddle-bg, $lightness: -10%);
			// $switch-paddle-border-color: scale-color($switch-paddle-bg, $lightness: -35%);
			// $switch-paddle-border-width: 1px;
			// $switch-paddle-border-style: solid;
			// $switch-paddle-transition-speed: .1s;
			// $switch-paddle-transition-ease: ease-out;
			// $switch-positive-color: scale-color($success-color, $lightness: 94%);
			// $switch-negative-color: #f5f5f5;
			
			// Outline Style for tabbing through switches
			// $switch-label-outline: 1px dotted #888;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'tables' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tables'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'tables_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tables_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tables_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tables_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// Tables
			// $include-html-table-classes: $include-html-classes;
			
			// These control the background color for the table and even rows
			// $table-bg: #fff;
			// $table-even-row-bg: #f9f9f9  ;
			
			// These control the table cell border style
			// $table-border-style: solid;
			// $table-border-size: 1px;
			// $table-border-color: #ddd;
			
			// These control the table head styles
			// $table-head-bg: #f5f5f5  ;
			// $table-head-font-size: rem-calc(14);
			// $table-head-font-color: #222;
			// $table-head-font-weight: bold;
			// $table-head-padding: rem-calc(8 10 10);
			
			// These control the row padding and font styles
			// $table-row-padding: rem-calc(9 10);
			// $table-row-font-size: rem-calc(14);
			// $table-row-font-color: #222;
			// $table-line-height: rem-calc(18);
			
			// These are for controlling the display and margin of tables
			// $table-display: table-cell;
			// $table-margin-bottom: rem-calc(20);
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'tabs' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tabs'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'tabs_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tabs_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tabs_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tabs_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// TABS
			// $include-html-tabs-classes: $include-html-classes;
			
			// $tabs-navigation-padding: rem-calc(16);
			// $tabs-navigation-bg-color: #efefef  ;
			// $tabs-navigation-active-bg-color: #fff;
			// $tabs-navigation-hover-bg-color: scale-color($tabs-navigation-bg-color, $lightness: -6%);
			// $tabs-navigation-font-color: #222;
			// $tabs-navigation-font-size: rem-calc(16);
			// $tabs-navigation-font-family: $body-font-family;
			
			// $tabs-content-margin-bottom: rem-calc(24);
			// $tabs-content-padding: $column-gutter/2;
			
			// $tabs-vertical-navigation-margin-bottom: 1.25rem;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'thumbs' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['thumbs'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'thumbs_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['thumbs_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['thumbs_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['thumbs_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// THUMBNAILS
			// $include-html-media-classes: $include-html-classes;
			
			// We use these to control border styles
			// $thumb-border-style: solid;
			// $thumb-border-width: 4px;
			// $thumb-border-color: #fff;
			// $thumb-box-shadow: 0 0 0 1px rgba(#000,.2);
			// $thumb-box-shadow-hover: 0 0 6px 1px rgba($primary-color,0.5);
			
			// Radius and transition speed for thumbs
			// $thumb-radius: $global-radius;
			// $thumb-transition-speed: 200ms;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'tooltips' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tooltips'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'tooltips_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tooltips_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tooltips_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['tooltips_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// TOOLTIPS
			//
			
			// $include-html-tooltip-classes: $include-html-classes;
			
			// $has-tip-border-bottom: dotted 1px #ccc;
			// $has-tip-font-weight: bold;
			// $has-tip-font-color: #333;
			// $has-tip-border-bottom-hover: dotted 1px scale-color($primary-color, $lightness: -55%);
			// $has-tip-font-color-hover: $primary-color;
			// $has-tip-cursor-type: help;
			
			// $tooltip-padding: rem-calc(12);
			// $tooltip-bg: #333;
			// $tooltip-font-size: rem-calc(14);
			// $tooltip-font-weight: normal;
			// $tooltip-font-color: #fff;
			// $tooltip-line-height: 1.3;
			// $tooltip-close-font-size: rem-calc(10);
			// $tooltip-close-font-weight: normal;
			// $tooltip-close-font-color: #777;
			// $tooltip-font-size-sml: rem-calc(14);
			// $tooltip-radius: $global-radius;
			// $tooltip-rounded: $global-rounded;
			// $tooltip-pip-size: 5px;
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'top_bar' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['top_bar'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'top_bar_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['top_bar_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['top_bar_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['top_bar_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'
// TOP BAR
// $include-html-top-bar-classes: $include-html-classes;

// Background color for the top bar
// $topbar-bg-color: #333;
// $topbar-bg: $topbar-bg-color;

// Height and margin
// $topbar-height: 45px;
// $topbar-margin-bottom: 0;

// Controlling the styles for the title in the top bar
// $topbar-title-weight: normal;
// $topbar-title-font-size: rem-calc(17);

// Style the top bar dropdown elements
// $topbar-dropdown-bg: #333;
// $topbar-dropdown-link-color: #fff;
// $topbar-dropdown-link-bg: #333;
// $topbar-dropdown-link-weight: normal;
// $topbar-dropdown-toggle-size: 5px;
// $topbar-dropdown-toggle-color: #fff;
// $topbar-dropdown-toggle-alpha: 0.4;

// Set the link colors and styles for top-level nav
// $topbar-link-color: #fff;
// $topbar-link-color-hover: #fff;
// $topbar-link-color-active: #fff;
// $topbar-link-color-active-hover: #fff;
// $topbar-link-weight: normal;
// $topbar-link-font-size: rem-calc(13);
// $topbar-link-hover-lightness: -10%; // Darken by 10%
// $topbar-link-bg: $topbar-bg;
// $topbar-link-bg-hover: #272727;
// $topbar-link-bg-active: $primary-color;
// $topbar-link-bg-active-hover: scale-color($primary-color, $lightness: -14%);
// $topbar-link-font-family: $body-font-family;
// $topbar-link-text-transform: none;
// $topbar-link-padding: $topbar-height / 3;

// $topbar-button-font-size: 0.75rem;
// $topbar-button-top: 7px;

// $topbar-dropdown-label-color: #777;
// $topbar-dropdown-label-text-transform: uppercase;
// $topbar-dropdown-label-font-weight: bold;
// $topbar-dropdown-label-font-size: rem-calc(10);
// $topbar-dropdown-label-bg: #333;

// Top menu icon styles
// $topbar-menu-link-transform: uppercase;
// $topbar-menu-link-font-size: rem-calc(13);
// $topbar-menu-link-weight: bold;
// $topbar-menu-link-color: #fff;
// $topbar-menu-icon-color: #fff;
// $topbar-menu-link-color-toggled: #888;
// $topbar-menu-icon-color-toggled: #888;

// Transitions and breakpoint styles
// $topbar-transition-speed: 300ms;
// Using rem-calc for the below breakpoint causes issues with top bar
// $topbar-breakpoint: #{lower-bound($medium-range)}; 
// Change to 9999px for always mobile layout
// $topbar-media-query: $medium-up;

// Divider Styles
// $topbar-divider-border-bottom: solid 1px  scale-color($topbar-bg-color, $lightness: 13%);
// $topbar-divider-border-top: solid 1px scale-color($topbar-bg-color, $lightness: -50%);
// Sticky Class
// $topbar-sticky-class: ".sticky";
// $topbar-arrows: true; 
// Set false to remove the triangle icon from the menu item
			',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>4000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'type' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['type'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'type_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['type_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['type_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['type_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>' ',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),	
		'visibility' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['visibility'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'visibility_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['visibility_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['visibility_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_ftc_settings']['visibility_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'// VISIBILITY CLASSES
			// $include-html-visibility-classes: $include-html-classes;
			// $include-table-visibility-classes: true;
			// $include-legacy-visibility-classes: true;',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		)		
		

	)
);




/**
 * Class tl_ftc_settings
 *
 */
class tl_ftc_settings extends Backend
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
		return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}
	
		/**
		 * Return all template folders as array
		 * @return array
		 */
		public function getTemplateFolders()
		{
			return $this->doGetTemplateFolders('files');
		}
	
	
		/**
		 * Return all template folders as array
		 * @param string
		 * @param integer
		 * @return array
		 */
		protected function doGetTemplateFolders($path, $level=0)
		{
			$return = array();
	
			foreach (scan(TL_ROOT . '/' . $path) as $file)
			{
				if (is_dir(TL_ROOT . '/' . $path . '/' . $file))
				{
					$return[$path . '/' . $file] = str_repeat(' &nbsp; &nbsp; ', $level) . $file;
					$return = array_merge($return, $this->doGetTemplateFolders($path . '/' . $file, $level+1));
				}
			}
	
			return $return;
		}


}
	

?>