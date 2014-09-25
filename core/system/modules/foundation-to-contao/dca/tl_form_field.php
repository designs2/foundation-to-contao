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
 

 $palettes = $GLOBALS['TL_DCA']['tl_form_field']['palettes'];

 foreach ($palettes as $p => $str) {
 	 $pallete_ftc = str_replace("{type_legend}","{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{label_legend},label_classes;{fix_legend},post_pre_fix,label_role,label_small_ftc,label_large_ftc;{type_legend}",$str);
 	 	$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$p]=$pallete_ftc;
 }
 $GLOBALS['TL_DCA']['tl_form_field']['palettes']['row_start']='{type_legend},type;{row_legend},is_collapse;{template_legend:hide},customTpl';
 $GLOBALS['TL_DCA']['tl_form_field']['palettes']['row_stop']='{type_legend},type;{template_legend:hide},customTpl';
 $GLOBALS['TL_DCA']['tl_form_field']['palettes']['range_slider']='{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{label_legend},label,label_classes;{type_legend},type;{slider_legend},rs_classes,rs_start,rs_end,rs_step,rs_show_value,rs_unity;{template_legend:hide},customTpl';
   
 $GLOBALS['TL_DCA']['tl_form_field']['palettes']['submit']='{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{type_legend},type,slabel;{button_legend}, btn_styles,btn_size,label_role;{image_legend:hide},imageSubmit;{expert_legend:hide},class,accesskey,tabindex;{template_legend:hide},customTpl'; 
    
    
 $GLOBALS['TL_DCA']['tl_form_field']['palettes']['fieldsetfsStart']  ='{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{label_legend},label_classes;{type_legend},type;{fconfig_legend},fsType,label;{template_legend:hide},customTpl';
  
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_form_field']['fields'])-1;

 $GLOBALS['TL_DCA']['tl_form_field']['palettes']['default'] = $pallete_ftc;
	  
	array_insert($GLOBALS['TL_DCA']['tl_form_field']['fields'], $fieldsSize, array
	(
	'small_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['small_ftc'],
				'default'                 => 'small-12',
				
				'exclude'                 => true,
				 
				
				'inputType'               => 'select',
				'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['small_ftc_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
		'large_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['large_ftc'],
					'default'                 => 'large-12',
					
					'exclude'                 => true,
					 
					
					'inputType'               => 'select',
					'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
					'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['large_ftc_options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		'float_ftc' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['float_ftc'],
					'default'                 => '',
					'options'=>array(' ','left','right'),
					'exclude'                 => true,
					 
					
					'inputType'               => 'select',
				
					'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['float_ftc_options'],
					'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
					'sql'                     => "varchar(255) NOT NULL default ''"
				),
		   'align_ftc' => array
		   		(
		   			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['align_ftc'],
		   			'default'                 => '',
		   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
		   			'exclude'                 => true,
		   			 
		   			
		   			'inputType'               => 'select',
		   		
		   			'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['align_ftc_options'],
		   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   			'sql'                     => "varchar(255) NOT NULL default ''"
		   		),
		   		
		   //ftc post or prefix
		   'post_pre_fix' => array
		   		(
		   			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['post_pre_fix'],
		   			'exclude'                 => true,
		   			'inputType'               => 'text',
		   			'eval'                    => array('tl_class'=>'w50 '),
		   			'sql'                     => "varchar(255) NOT NULL default ''"
		   		),
		   //Buttons settings
		   'btn_size' => array
		      		(
		      			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_size'],
		      			'default'                 => '',
		      			'options'=>array(' ','tiny','small','large'),
		      			'exclude'                 => true,
		      		
		      			'inputType'               => 'select',
		      			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['btn_size_options'],
		      			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		      			'sql'                     => "varchar(255) NOT NULL default ''"
		      		),
		     'btn_styles' => array
		        		(
		        			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_styles'],
		        			'default'                 => '',
		        			'options'=>array(' ','alert','success','secondary','radius','round','disabled','expand'),
		        			'exclude'                 => true,
		        			
		        			'inputType'               => 'select',
		        			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['btn_styles_options'],
		        			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		        			'sql'                     => "varchar(255) NOT NULL default ''"
		        		),
		   	
		  //ftc label
		  'label_small_ftc' => array
		  		(
		  			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['label_small_ftc'],
		  			'default'                 => 'small-12',
		  			'exclude'                 => true,
		  			 
		  			'inputType'               => 'select',
		  			'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
		  			'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['label_small_ftc_options'],
		  			'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		  			'sql'                     => "varchar(255) NOT NULL default 'small-12'"
		  		),
		  	'label_large_ftc' => array
		  			(
		  				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['label_large_ftc'],
		  				'default'                 => 'large-12',
		  			
		  				'exclude'                 => true,
		  				'inputType'               => 'select',
		  				'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
		  				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['label_large_ftc_options'],
		  				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		  				'sql'                     => "varchar(255) NOT NULL default 'large-12'"
		  			),
		  	'label_float_ftc' => array
		  			(
		  				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['label_float_ftc'],
		  				'default'                 => '',
		  				'options'=>array(' ','left','right'),
		  				'exclude'                 => true,
		  				 
		  				
		  				'inputType'               => 'select',
		  				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['label_float_ftc_options'],
		  				'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		  				'sql'                     => "varchar(255) NOT NULL default ''"
		  			),
		  	   'label_align_ftc' => array
		  	   		(
		  	   			'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['label_align_ftc'],
		  	   			'default'                 => '',
		  	   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
		  	   			'exclude'                 => true,
		  	   			 
		  	   			
		  	   			'inputType'               => 'select',
		  	   			'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['label_align_ftc_options'],
		  	   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		  	   			'sql'                     => "varchar(255) NOT NULL default ''"
		  	   		),
		   	//ftc row			
		   	'is_collapse' => array
		   	(
		   		'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['is_collapse'],
		   		'exclude'                 => true,
		   		'inputType'               => 'checkbox',
		   		'eval'                    => array('submitOnChange'=>true),
		   		'sql'                     => "char(1) NOT NULL default ''"
		   	),
		   	'label_role' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['label_role'],
		   				'default'                 => ' ',
		   				'options'=>array(' ','prefix','postfix'),
		   				
		   				'inputType'               => 'select',
		   				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['label_role_options'],
		   				'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		   				'sql'                     => "varchar(255) NOT NULL default ''"
		   	),
		   	'label_classes' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['label_classes'],
		   				'default'                 => 'no-style',
		   				'options'=>array(' ','no-style','alert','success','secondary','radius','round'),
		   				
		   				'inputType'               => 'select',
		   			
		   				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['label_classes_options'],
		   				'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		   				'sql'                     => "varchar(255) NOT NULL default 'no-style'"
		   	),
		   	//range slider
		   	'rs_classes' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_classes'],
		   				'default'                 => ' ',
		   				'options'=>array(' ','radius','round'),
		   				
		   				'inputType'               => 'select',
		   				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['rs_classes_options'],
		   				'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		   				'sql'                     => "varchar(32) NOT NULL default ''"
		   	),
		   	//display_selector
		   	'rs_show_value' => array
		   	(
		   		'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_show_value'],
		   		'exclude'                 => true,
		   		'inputType'               => 'checkbox',
		   		'eval'                    => array('submitOnChange'=>true),
		   		'sql'                     => "char(1) NOT NULL default '1'"
		   	),
		   	'rs_start' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_start'],
		   				'exclude'                 => true,
		   				'default'				=>'0',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'rs_end' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_end'],
		   				'exclude'                 => true,
		   				'default'				=>'100',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'rs_step' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_step'],
		   				'exclude'                 => true,
		   				'default'				=>'10',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'rs_unity' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_unity'],
		   				'exclude'                 => true,
		   				'default'				=>'',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 ','placeholder'=>' e.g. pieces'),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			)
		      
		   
	  ));
	  
	  
 $GLOBALS['TL_DCA']['tl_form_field']['list']['sorting']['child_record_callback']   = array('tl_ftc_form', 'listFormFields');
	  
	  
	  
class tl_ftc_form extends \tl_form_field
{	  
	  
	  
	  
	  /**
	  	 * Add the type of input field
	  	 * @param array
	  	 * @return string
	  	 */
	  	public function listFormFields($arrRow)
	  	{
	  		$arrRow['required'] = $arrRow['mandatory'];
	  		$key = $arrRow['invisible'] ? 'unpublished' : 'published';
	  		$headline=unserialize($arrRow['headline']);
	  		$cssType='';
	  		$no_preview=false;
	  		if (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['start'])){
	  		$no_preview=true;
	  		}
	  		else if (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop'])) {
	  			$no_preview=true;
	  		} else if  (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['separator'])) {
	  			$no_preview=true;
	  		}
	  			  		
	  		$CssID= unserialize($arrRow['cssID']);
	  		$CssClass= $cssType.' form_'.$arrRow['type'].' '.$CssID[1].' '.$arrRow['small_ftc'].' '.$arrRow['large_ftc'].' '.$arrRow['float_ftc'].' '.$this->splitArr($arrRow['align_ftc']).' ';
	  		
	  		$strType .= '<div class="cte_type ' . $key . $CssClass.'">' . $GLOBALS['TL_LANG']['FFL'][$arrRow['type']][0] . ($arrRow['name'] ? ' (' . $arrRow['name'] . ')' : '') . '</div>';
	  		
	  		if ($no_preview!==true) {
	  			$strType .= '<div class="limit_height' . (!Config::get('doNotCollapse') ? ' h32' : '') . '">';

		  		$strClass = $GLOBALS['TL_FFL'][$arrRow['type']];
		  
		  		if (!class_exists($strClass))
		  		{
		  			return '';
		  		}
		  
		  		$objWidget = new $strClass($arrRow);
		  
		  		$strWidget = $objWidget->parse();
		  		$strWidget = preg_replace('/ name="[^"]+"/i', '', $strWidget);
		  		$strWidget = str_replace(array(' type="submit"', ' autofocus', ' required'), array(' type="button"', '', ''), $strWidget);
		  
		  		if ($objWidget instanceof \FormHidden)
		  		{
		  			return $strType . "\n" . $objWidget->value . "\n</div>\n";
		  		}
		  
		  		return $strType . '
				  <table class="tl_form_field_preview">
				  '.$strWidget.'</table>
				  </div>' . "\n";
	  
	 		 }else {
	 		 	return $strType . '' . "\n";
	 		 }
	  	}
	  public function splitArr($arr){
	  $str='';
	  	if ($arr==''||!is_array(unserialize($arr))) {
	  		return;
	  	}
	  	foreach (unserialize($arr) as $class) {
	  		$str.=' '.$class;
	  	}
	  	return $str;
	  }
	  
}
	  ?>