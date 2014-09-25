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
 * BE MOD
 * 
 * 
 */

array_insert($GLOBALS['BE_MOD'],0,array
(
	'ftc' => array
	(


	'tl_ftc_intro' => array
	    (
	    'callback'          => 'MHAHNEFELD\FTC\Intro',
      //   'tables'            => array('tl_ftc_intro'),
	  	'icon'           => 'system/modules/foundation-to-contao/assets/icons/icon.png'
	    
		),
	'tl_ftc_settings' => array
		    (
	     'tables'            => array('tl_ftc_settings'),
	     'icon'           => 'system/modules/foundation-to-contao/assets/icons/icon.png'
	    
		)
		

	)
	
));

$GLOBALS['TL_HOOKS']['getUserNavigation'][] = array('Themes', 'changeNav');

/**
 * Wrapper elements
 */
array_insert($GLOBALS['TL_WRAPPERS']['start'],0, array
(
	
		'acc_ftc_start',
		'acc_ftc_start_inside',
		'tab_ftc_start',
		'tab_ftc_start_inside',
		'row_start',
		'button_bar_start_ftc',
		'dropdown_buttons_content_start',
		'orbit_start',
		'orbit_start_inside',
		'reveal_modal_start',
		'fieldset'
		
	)
	
);

array_insert($GLOBALS['TL_WRAPPERS']['stop'],0, array
(
	
		'acc_ftc_stop',
		'acc_ftc_stop_inside',
		'tab_ftc_stop',
		'tab_ftc_stop_inside',
		'row_end',
		'row_stop',
		'button_bar_stop_ftc',
		'dropdown_buttons_content_stop',
		'orbit_stop',
		'orbit_stop_inside',
		'reveal_modal_stop',
		'magellan_stop',
		'row_stop'
		
	)
	
);

//'stop' => array
//(
//	'accordionStop',
//	'sliderStop'
//),
//'single' => array
//(
//	'accordionSingle'
//),
//'separator' => array()
/**
 * Content elements
 */
 $CTEsize =count($GLOBALS['TL_CTE']);
array_insert($GLOBALS['TL_CTE'] ,$CTEsize, array
(
	'ftc_orbit' => array
	(
		
		'orbit'        => 'ContentOrbit',
		'orbit_start'     => 'ContentOrbitStart',
		'orbit_stop'      => 'ContentOrbitStop',
		'orbit_start_inside'     => 'ContentOrbitStartInside',
		'orbit_stop_inside'      => 'ContentOrbitStopInside'
		
	),	
	'ftc_clearing' => array
	(
		'clearing'            => 'ContentClearing'
		
	),
	'ftc_accordion' => array
	(
		'acc_ftc_start'  => 'ContentAccStartFTC',
		'acc_ftc_stop'   => 'ContentAccStopFTC',
		'acc_ftc_start_inside'  => 'ContentAccStartInsideFTC',
		'acc_ftc_stop_inside'   => 'ContentAccStopInsideFTC'
		
	),
	'ftc_tab' => array
	(
		'tab_ftc_start'  => 'ContentTabStartFTC',
		'tab_ftc_stop'   => 'ContentTabStopFTC',
		'tab_ftc_start_inside'  => 'ContentTabStartInsideFTC',
		'tab_ftc_stop_inside'   => 'ContentTabStopInsideFTC'
		
	),
	'ftc_media' => array
	(
		'flex_video'        => 'ContentFlexVideo',
		'placeholder_image'           => 'ContentPlaceholderImage',
		//core
		'image'           => 'ContentImage',
		'player'          => 'ContentMedia'
		
		
	),
	'ftc_row' => array
	(
		'row_start'        => 'ContentRowStart',
		'row_stop'        => 'ContentRowStop'
		
	),
	'ftc_links' => array
	(
		
	//links core
	'hyperlink'       => 'ContentHyperlink',
	'toplink'         => 'ContentToplink',
	'download'        => 'ContentDownload',
	'downloads'       => 'ContentDownloads'
	
	
		
		
	),
	'ftc_buttons' => array
	(
		'button_ftc'            => 'ContentButtonFTC',
		'button_bar_start_ftc'            => 'ContentButtonBarStartFTC',
		'button_bar_stop_ftc'            => 'ContentButtonBarStopFTC',
		'button_group'            => 'ContentButtonGroup',
		'dropdown_buttons'            => 'ContentDropdownButtons',
		'dropdown_buttons_content_start'            => 'ContentDropdownButtonsContentStart',
		'dropdown_buttons_content_stop'            => 'ContentDropdownButtonsContentStop'
		
	),
	'ftc_callouts_prompts' => array
	(
		
		'joyride'           => 'ContentJoyride',
		'alert_box'            => 'ContentAlertBox',
		'reveal_modal_start'            => 'ContentRevealModalStart',
		'reveal_modal_stop'            => 'ContentRevealModalStop'
		
		
	),
	'ftc_magellan' => array
	(
		
		'magellan_nav'	=> 'ContentMagellanNav',
		'magellan_stop'	=> 'ContentMagellanStop'
	),
	'ftc_content' => array
	(
		
		'headline'            => 'ContentHeadline',
		'blockquote'            => 'ContentBlockquote',
		'vcard'            => 'ContentVCard',
		'list'            => 'ContentList',
		'def_list'            => 'ContentDefList',
		'progress_bar'            => 'ContentProgressBar',
		'price_table'        => 'ContentPriceTable',
		//core
		'table'           => 'ContentTable',
		'text'            => 'ContentText'
		
	),
	'ftc_code' => array
	(
		'html'            => 'ContentHtml',
		'code'            => 'ContentCode',
		'markdown'        => 'ContentMarkdown'
		
	)
));


/**
 * FE MOD
 * 
 * 
 */

array_insert($GLOBALS['FE_MOD'], 2, array
(
    'tl_ftc' => array
    (
        'ftc_topbar_start'         => 'ModuleTopbarStart',
        'ftc_topbar_section'         => 'ModuleTopbarSection',
        'ftc_topbar_section_custom'         => 'ModuleTopbarSectionCustom',
        'ftc_topbar_stop'         => 'ModuleTopbarStop',
        'ftc_offcanvas'         => 'ModuleOffcanvas',
        'ftc_offcanvas_custom'         => 'ModuleOffcanvasCustom'
    )
));


 
/**
 * MODEL 
 * 
 */
 $GLOBALS['TL_MODELS'] = array
 (
    'tl_mh_foundation_to_contao' => 'MHAHNEFELD\FTC\mhFoundationToContaoModel'
 );
 

 /**
  * Front end form fields
  */
  array_insert($GLOBALS['TL_FFL'], 2, array
  (
 	'row_start'    => 'FormRowStart',
 	'row_stop'    => 'FormRowStop',
 	'range_slider'    => 'FormRangeSlider'

 ));
 


 /*
 *
 *
 *  Contao-Konfigurieren
 *
 *
 */

 unset($GLOBALS['TL_CTE']['texts']);
 unset($GLOBALS['TL_CTE']['accordion']);
 unset($GLOBALS['TL_CTE']['links']);
 unset($GLOBALS['TL_CTE']['media']);
 unset($GLOBALS['TL_CTE']['slider']);
 unset($GLOBALS['TL_CTE']['files']);

$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PrepareVars', 'templates');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('PrepareVars', 'elements');
$GLOBALS['TL_HOOKS']['compileFormFields'][] = array('PrepareVars', 'forms');
//$GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = array('PrepareVars', 'modules');
//$GLOBALS['TL_HOOKS']['getArticle'][] = array('PrepareVars', 'articles');
$GLOBALS['TL_HOOKS']['loadFormField'][] = array('PrepareWidgets', 'ffl');



 ?>