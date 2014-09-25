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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Contao',
	'MHAHNEFELD\FTC',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	
	//HOOKs
	'MHAHNEFELD\FTC\PrepareVars' => 'system/modules/foundation-to-contao/classes/PrepareVars.php',
	'MHAHNEFELD\FTC\PrepareWidgets' => 'system/modules/foundation-to-contao/classes/PrepareWidgets.php',
	
	// Models
	'MHAHNEFELD\FTC\ftcSettingsModel' => 'system/modules/foundation-to-contao/models/ftcSettingsModel.php',

	// Modules
	'MHAHNEFELD\FTC\Module'  => 'system/modules/foundation-to-contao/modules/Module.php',
	'MHAHNEFELD\FTC\ModuleOffcanvasCustom'  => 'system/modules/foundation-to-contao/modules/ModuleOffcanvasCustom.php',
	'MHAHNEFELD\FTC\ModuleOffcanvas'  => 'system/modules/foundation-to-contao/modules/ModuleOffcanvas.php',
	'Contao\Module'  => 'system/modules/foundation-to-contao/modules/Module.php',
	//topbar
	'MHAHNEFELD\FTC\ModuleTopbarStart'  => 'system/modules/foundation-to-contao/modules/ModuleTopbarStart.php',
	'MHAHNEFELD\FTC\ModuleTopbarStop'  => 'system/modules/foundation-to-contao/modules/ModuleTopbarStop.php',
	'MHAHNEFELD\FTC\ModuleTopbarSectionCustom'  => 'system/modules/foundation-to-contao/modules/ModuleTopbarSectionCustom.php',
	'MHAHNEFELD\FTC\ModuleTopbarSection'  => 'system/modules/foundation-to-contao/modules/ModuleTopbarSection.php',
	
	//Classes
	'MHAHNEFELD\FTC\Intro'  => 'system/modules/foundation-to-contao/classes/Intro.php',
	'MHAHNEFELD\FTC\Themes'  => 'system/modules/foundation-to-contao/classes/Themes.php',
	
	//Elements magellan
	'MHAHNEFELD\FTC\ContentMagellanNav'  => 'system/modules/foundation-to-contao/elements/magellan/ContentMagellanNav.php',
	'MHAHNEFELD\FTC\ContentMagellanStop'  => 'system/modules/foundation-to-contao/elements/magellan/ContentMagellanStop.php',
	//Elements acc
	'MHAHNEFELD\FTC\ContentAccStartFTC'  => 'system/modules/foundation-to-contao/elements/accordion/ContentAccStartFTC.php',
	'MHAHNEFELD\FTC\ContentAccStopFTC'  => 'system/modules/foundation-to-contao/elements/accordion/ContentAccStopFTC.php',
	'MHAHNEFELD\FTC\ContentAccStartInsideFTC'  => 'system/modules/foundation-to-contao/elements/accordion/ContentAccStartInsideFTC.php',
	'MHAHNEFELD\FTC\ContentAccStopInsideFTC'  => 'system/modules/foundation-to-contao/elements/accordion/ContentAccStopInsideFTC.php',
	//Elements tab
	'MHAHNEFELD\FTC\ContentTabStartFTC'  => 'system/modules/foundation-to-contao/elements/tab/ContentTabStartFTC.php',
	'MHAHNEFELD\FTC\ContentTabStopFTC'  => 'system/modules/foundation-to-contao/elements/tab/ContentTabStopFTC.php',
	'MHAHNEFELD\FTC\ContentTabStartInsideFTC'  => 'system/modules/foundation-to-contao/elements/tab/ContentTabStartInsideFTC.php',
	'MHAHNEFELD\FTC\ContentTabStopInsideFTC'  => 'system/modules/foundation-to-contao/elements/tab/ContentTabStopInsideFTC.php',
	//Elements row
	'MHAHNEFELD\FTC\ContentRowStart'  => 'system/modules/foundation-to-contao/elements/row/ContentRowStart.php',
	'MHAHNEFELD\FTC\ContentRowStop'  => 'system/modules/foundation-to-contao/elements/row/ContentRowStop.php',
	//Elements Content
	'MHAHNEFELD\FTC\ContentListFTC'  => 'system/modules/foundation-to-contao/elements/content/ContentListFTC.php',
	'MHAHNEFELD\FTC\ContentDefList'  => 'system/modules/foundation-to-contao/elements/content/ContentDefList.php',
	'MHAHNEFELD\FTC\ContentPriceTable'  => 'system/modules/foundation-to-contao/elements/content/ContentPriceTable.php',
	
	'MHAHNEFELD\FTC\ContentBlockquote'  => 'system/modules/foundation-to-contao/elements/content/ContentBlockquote.php',
	'MHAHNEFELD\FTC\ContentVCard'  => 'system/modules/foundation-to-contao/elements/content/ContentVCard.php',
	'MHAHNEFELD\FTC\ContentProgressBar'  => 'system/modules/foundation-to-contao/elements/content/ContentProgressBar.php',
	
	//Elements Buttons Dropdown
	'MHAHNEFELD\FTC\ContentButtonBarStartFTC'  => 'system/modules/foundation-to-contao/elements/buttons/ContentButtonBarStartFTC.php',
	'MHAHNEFELD\FTC\ContentButtonBarStopFTC'  => 'system/modules/foundation-to-contao/elements/buttons/ContentButtonBarStopFTC.php',
	'MHAHNEFELD\FTC\ContentButtonGroup'  => 'system/modules/foundation-to-contao/elements/buttons/ContentButtonGroup.php',
	'MHAHNEFELD\FTC\ContentButtonFTC'  => 'system/modules/foundation-to-contao/elements/buttons/ContentButtonFTC.php',
	'MHAHNEFELD\FTC\ContentDropdownButtons'  => 'system/modules/foundation-to-contao/elements/buttons/ContentDropdownButtons.php',
	'MHAHNEFELD\FTC\ContentDropdownButtonsContentStart'  => 'system/modules/foundation-to-contao/elements/buttons/ContentDropdownButtonsContentStart.php',
	'MHAHNEFELD\FTC\ContentDropdownButtonsContentStop'  => 'system/modules/foundation-to-contao/elements/buttons/ContentDropdownButtonsContentStop.php',
	//Slider und Gallery
	'MHAHNEFELD\FTC\ContentOrbit'  => 'system/modules/foundation-to-contao/elements/orbit/ContentOrbit.php',
	'MHAHNEFELD\FTC\ContentOrbitStart'  => 'system/modules/foundation-to-contao/elements/orbit/ContentOrbitStart.php',
	'MHAHNEFELD\FTC\ContentOrbitStop'  => 'system/modules/foundation-to-contao/elements/orbit/ContentOrbitStop.php',
	'MHAHNEFELD\FTC\ContentOrbitStartInside'  => 'system/modules/foundation-to-contao/elements/orbit/ContentOrbitStartInside.php',
	'MHAHNEFELD\FTC\ContentOrbitStopInside'  => 'system/modules/foundation-to-contao/elements/orbit/ContentOrbitStopInside.php',
	'MHAHNEFELD\FTC\ContentClearing'  => 'system/modules/foundation-to-contao/elements/clearing/ContentClearing.php',

	//Videos
	'MHAHNEFELD\FTC\ContentFlexVideo'  =>	'system/modules/foundation-to-contao/elements/media/ContentFlexVideo.php',
	//placeholder
	'MHAHNEFELD\FTC\ContentPlaceholderImage'  =>	'system/modules/foundation-to-contao/elements/media/ContentPlaceholderImage.php',
	//Prompts & Callouts
	'MHAHNEFELD\FTC\ContentRevealModalStart' =>	'system/modules/foundation-to-contao/elements/callouts_prompts/ContentRevealModalStart.php',
	'MHAHNEFELD\FTC\ContentRevealModalStop'  =>	'system/modules/foundation-to-contao/elements/callouts_prompts/ContentRevealModalStop.php',
	'MHAHNEFELD\FTC\ContentAlertBox'  =>	'system/modules/foundation-to-contao/elements/callouts_prompts/ContentAlertBox.php',
	'MHAHNEFELD\FTC\ContentJoyride'  =>	'system/modules/foundation-to-contao/elements/callouts_prompts/ContentJoyride.php',
	
	//Form Elements FTC
	'MHAHNEFELD\FTC\FormRowStart'  => 'system/modules/foundation-to-contao/forms/FormRowStart.php',
	'MHAHNEFELD\FTC\FormRowStop'  => 'system/modules/foundation-to-contao/forms/FormRowStop.php',
	'MHAHNEFELD\FTC\FormRangeSlider'  => 'system/modules/foundation-to-contao/forms/FormRangeSlider.php'
			
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(	
	'be_main' => 'system/modules/foundation-to-contao/templates/backend',
	'be_wildcard' => 'system/modules/foundation-to-contao/templates/backend',
	'be_ftc_introduction' => 'system/modules/foundation-to-contao/templates/backend',
	'be_ftc_overview' => 'system/modules/foundation-to-contao/templates/backend',
	
	'fe_page' => 'system/modules/foundation-to-contao/templates/frontend',
	
	//modules
	'mod_topbar_start' => 'system/modules/foundation-to-contao/templates/modules',
	'mod_topbar_section' => 'system/modules/foundation-to-contao/templates/modules',
	'mod_topbar_stop' => 'system/modules/foundation-to-contao/templates/modules',
	'nav_default_topbar' => 'system/modules/foundation-to-contao/templates/modules',
	'mod_navigation_offcanvas' => 'system/modules/foundation-to-contao/templates/modules',
	'nav_default_offcanvas' => 'system/modules/foundation-to-contao/templates/modules',
	'mod_breadcrumb' => 'system/modules/foundation-to-contao/templates/modules',
	'mod_search_simple_topbar' => 'system/modules/foundation-to-contao/templates/modules',
	'search_default_topbar' => 'system/modules/foundation-to-contao/templates/modules',
	
	
	
	//elements
	'ce_magellan_nav'  => 'system/modules/foundation-to-contao/templates/magellan',
	'ce_magellan_stop'  => 'system/modules/foundation-to-contao/templates/magellan',
	
	'ce_text_ftc' => 'system/modules/foundation-to-contao/templates/content',
	'mod_mh_foundation-to-contao' => 'system/modules/foundation-to-contao/templates',
	//forms
	'form' => 'system/modules/foundation-to-contao/templates/forms',
	//acc
	'ce_acc_start' => 'system/modules/foundation-to-contao/templates/accordion',
	'ce_acc_stop' => 'system/modules/foundation-to-contao/templates/accordion',
	'ce_acc_start_inside' => 'system/modules/foundation-to-contao/templates/accordion',
	'ce_acc_stop_inside' => 'system/modules/foundation-to-contao/templates/accordion',
	
	'ce_tab_start' => 'system/modules/foundation-to-contao/templates/tab',
	'ce_tab_stop' => 'system/modules/foundation-to-contao/templates/tab',
	'ce_tab_start_inside' => 'system/modules/foundation-to-contao/templates/tab',
	'ce_tab_stop_inside' => 'system/modules/foundation-to-contao/templates/tab',
	
	'ce_row_start' => 'system/modules/foundation-to-contao/templates/row',
	'ce_row_stop' => 'system/modules/foundation-to-contao/templates/row',
	
	'ce_list_ftc' => 'system/modules/foundation-to-contao/templates/content',
	'ce_def_list' => 'system/modules/foundation-to-contao/templates/content',
	'ce_price_table' => 'system/modules/foundation-to-contao/templates/content',
	'ce_headline_ftc' => 'system/modules/foundation-to-contao/templates/content',
	'ce_blockquote' => 'system/modules/foundation-to-contao/templates/content',
	'ce_vcard' => 'system/modules/foundation-to-contao/templates/content',
	'ce_progress_bar' => 'system/modules/foundation-to-contao/templates/content',
	
	'ce_button_ftc' => 'system/modules/foundation-to-contao/templates/buttons',
	'ce_button_group' => 'system/modules/foundation-to-contao/templates/buttons',
	'ce_button_bar_start_ftc' => 'system/modules/foundation-to-contao/templates/buttons',
	'ce_button_bar_stop_ftc' => 'system/modules/foundation-to-contao/templates/buttons',
	'ce_dropdown_buttons' => 'system/modules/foundation-to-contao/templates/buttons',
	'ce_dropdown_buttons_content_start' => 'system/modules/foundation-to-contao/templates/buttons',
	'ce_dropdown_buttons_content_stop' => 'system/modules/foundation-to-contao/templates/buttons',
	
	'ce_orbit' => 'system/modules/foundation-to-contao/templates/orbit',
	'ce_orbit_start' => 'system/modules/foundation-to-contao/templates/orbit',
	'ce_orbit_stop' => 'system/modules/foundation-to-contao/templates/orbit',
	'ce_orbit_start_inside' => 'system/modules/foundation-to-contao/templates/orbit',
	'ce_orbit_stop_inside' => 'system/modules/foundation-to-contao/templates/orbit',
	'orbit_list' => 'system/modules/foundation-to-contao/templates/orbit',
	
	'ce_clearing' => 'system/modules/foundation-to-contao/templates/clearing',
	'clearing_list' => 'system/modules/foundation-to-contao/templates/clearing',
	'pagination_ftc' => 'system/modules/foundation-to-contao/templates/clearing',
		
	'ce_flex_video' => 'system/modules/foundation-to-contao/templates/media',
	'ce_image' => 'system/modules/foundation-to-contao/templates/media',
	'ce_placeholder_image' => 'system/modules/foundation-to-contao/templates/media',
	
	'ce_reveal_modal_start' => 'system/modules/foundation-to-contao/templates/callouts_prompts',
	'ce_reveal_modal_stop' => 'system/modules/foundation-to-contao/templates/callouts_prompts',
	'ce_alert_box' => 'system/modules/foundation-to-contao/templates/callouts_prompts',
	'ce_joyride' => 'system/modules/foundation-to-contao/templates/callouts_prompts',
	//forms
	'form_select_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_upload_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_checkbox_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_explanation_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_fieldset_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_headline_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_password_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_radio_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_submit_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_textarea_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_textfield_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_captcha_ftc' => 'system/modules/foundation-to-contao/templates/forms',
	'form_message_ftc' => 'system/modules/foundation-to-contao/templates/forms',

	'form_row_start' => 'system/modules/foundation-to-contao/templates/forms',
	'form_row_stop' => 'system/modules/foundation-to-contao/templates/forms',
	'form_range_slider' => 'system/modules/foundation-to-contao/templates/forms'
		
));
