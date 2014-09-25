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
 
 $ftc_grid = '{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc,data_attr_ftc;';
  
 $palettes = $GLOBALS['TL_DCA']['tl_content']['palettes'];
 foreach ($palettes as $p => $str) {
 	 
 	 if ($p=='list') {
 	 $str = str_replace("listitems","listitems,list_style_type",$str);	
 	 }
 	 $pallete_ftc = str_replace("{type_legend}",$ftc_grid."{type_legend}",$str);
 	 $GLOBALS['TL_DCA']['tl_content']['palettes'][$p]=$pallete_ftc;
 }

$fieldsSize=count($GLOBALS['TL_DCA']['tl_content']['fields'])-1;
$palettesSize=count($palettes)-1;
$default = '{type_legend},type,headline;';
$expert ='{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

//add palettes for contentelements
array_insert($GLOBALS['TL_DCA']['tl_content']['palettes'], $palettesSize, array
(
	'orbit'        =>  $ftc_grid.$default.'{source_legend},multiSRC,sortBy,useHomeDir;{image_legend},size,numberOfItems;'.$expert,
	'orbit_start'        => $ftc_grid.$default.$expert,
	'orbit_start_inside'        => $default.$expert,
	'orbit_stop'        => $default.$expert,
	'orbit_stop_inside'        => $default.$expert,
	
	'clearing'            => $ftc_grid.$default.'{source_legend},multiSRC,sortBy,useHomeDir;{image_legend},size,perRow,perPage,numberOfItems;'.$expert,
	'button_ftc'            => '{type_legend},type,btn_name,cta_href,use_reveal;{button_legend},btn_size,btn_styles;'.$expert,
	'button_bar_start_ftc'            => $default.$expert,
	'button_bar_stop_ftc'            => '{type_legend},type;'.$expert,
	'button_group'            => '{type_legend},type;{dropdown_legend},list_links;{button_legend},btn_size,btn_styles;'.$expert,
	
	'dropdown_buttons'            => '{type_legend},type,btn_name;{dropdown_legend},list_links,drop_align;{button_legend},btn_size,btn_styles,btn_split,btn_hover;'.$expert,
	
	'dropdown_buttons_content_start'            =>'{ftc_legend},small_ftc,large_ftc,float_ftc,align_ftc;{type_legend},type,btn_name,drop_align;{button_legend},btn_size,btn_styles,btn_split,btn_hover;'.$expert,
	'dropdown_buttons_content_stop'            =>'{type_legend},type;'.$expert,
	

	'joyride'           => '{type_legend},type;{joyride_legend},joyride;'.$expert,
	'alert_box'            => '{type_legend},type;{alert_legend},alert_kind,alert_style,alert_txt;'.$expert,
	'reveal_modal_start'            =>   $ftc_grid.'{type_legend},type;'.$expert,
	'reveal_modal_stop'            => '{type_legend},type;'.$expert,
	
	

	'row_start'        => '{type_legend},type,headline,cssID,row_data_attr_ftc',
	'row_stop'        => '{type_legend},type;'.$expert,
	
	'magellan_stop'            =>  $ftc_grid.$default.$expert,
	'magellan_nav'            => '{type_legend},type;{magellan_legend},magellan_nav;'.$expert,

	'blockquote'            =>  $ftc_grid.$default.'{blockquote_legend},blockquote,cite;'.$expert,
	'vcard'            => $ftc_grid.$default.'{vcard_legend},vcard;'.$expert,
	'def_list'            => $ftc_grid.$default.'{list_legend},def_list;'.$expert,
	
	'progress_bar'            => $ftc_grid.'{type_legend},type,progress_size,btn_styles;'.$expert,
	
	'tab_ftc_start'  =>  $ftc_grid.$default.'{nav_legend},tabs_nav,tabs_align;'.$expert ,
	'tab_ftc_stop'   => '{type_legend},type;'.$expert,
	'tab_ftc_start_inside'  => $default.$expert,
	'tab_ftc_stop_inside'   => '{type_legend},type;'.$expert,
	
	'acc_ftc_start'  =>  $ftc_grid.$default.$expert,
	'acc_ftc_stop'   => '{type_legend},type;'.$expert,
	'acc_ftc_start_inside'  => $default.$expert,
	'acc_ftc_stop_inside'   => '{type_legend},type;'.$expert,
	'price_table'        => $ftc_grid.$default.'{table_legend},price_table,cta_href;'.$expert,
	
	'flex_video'        => $ftc_grid.$default.'{video_legend},use_youtube,vimeo,own_src;'.$expert,
	'placeholder_image'                       => $ftc_grid.$default.'{placeholder_legend},is_bw,stamp,topic;{image_legend},alt,title,size,imagemargin,imageUrl,caption;'.$expert,

  
  ));
  
  //selector
 
  array_insert($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'] ,1,array('use_reveal','use_youtube','vimeo','own_src'));
  //add subpalletes
  //var_dump($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__']);
  $subpalettes = $GLOBALS['TL_DCA']['tl_content']['subpalettes'];
  $subpalettesSize=count($subpalettes)-1;
  //add palettes for contentelements
  array_insert($GLOBALS['TL_DCA']['tl_content']['subpalettes'], $subpalettesSize, array
  (
  	'use_reveal'        => 'modal_id',
  	'use_youtube'        => 'playerSize,autoplay,youtube_vimeo_id',
  	'vimeo'        => 'playerSize,autoplay,youtube_vimeo_id',
  	'own_src'        => 'playerSize,autoplay,posterSRC,video_src,track_src,flash_player_src,flash_video_src'
  
  ));
  
  
	array_insert($GLOBALS['TL_DCA']['tl_content']['fields'], $fieldsSize, array
	(
	'small_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_content']['small_ftc'],
				'default'                 => 'small-12',
				//'options'=>array('topic',' '),
				'exclude'                 => true,
				
				'inputType'               => 'select',
				'options_callback'        => array('ftcSettingsModel', 'getSmallOpitons'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_content']['small_ftc_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
	'large_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_content']['large_ftc'],
				'default'                 => 'large-12',
				//'options'=>array('topic',' '),
				'exclude'                 => true,
		
				'inputType'               => 'select',
				'options_callback'        => array('ftcSettingsModel', 'getLargeOpitons'),
				'reference'               => &$GLOBALS['TL_LANG']['tl_content']['large_ftc_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
	'float_ftc' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_content']['float_ftc'],
				'default'                 => '',
				'options'=>array(' ','left','right'),
				'exclude'                 => true,
			
				'inputType'               => 'select',
				'reference'               => &$GLOBALS['TL_LANG']['tl_content']['float_ftc_options'],
				'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
				'sql'                     => "varchar(255) NOT NULL default ''"
			),
	 'align_ftc' => array
	   		(
	   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['align_ftc'],
	   			'default'                 => '',
	   			'options'=>array(' ','small-centered','small-uncentered','large-centered','large-uncentered'),
	   			'exclude'                 => true,
	   			
	   			'inputType'               => 'select',
	   			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['align_ftc_options'],
	   			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
	   			'sql'                     => "varchar(255) NOT NULL default ''"
	   		),
	  'data_attr_ftc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['data_attr_ftc'],
			'default'                 => '',
			'options'=>array(' ','data-equalizer-watch'),
			'exclude'                 => true,
			
			'inputType'               => 'select',
		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['data_attr_ftc_options'],
			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
	'row_data_attr_ftc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['row_data_attr_ftc'],
			'default'                 => '',
			'options'=>array(' ','data-equalizer'),
			'exclude'                 => true,

			'inputType'               => 'select',
		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['row_data_attr_ftc_options'],
			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
			
//TABS			
'tabs_nav' => array
     (
         'label'                 => &$GLOBALS['TL_LANG']['tl_content']['tabs_nav'],
         'exclude'               => true,
         'inputType'             => 'multiColumnWizard',
         'eval' => array
         (
             'tl_class'          => 'clr',
             'columnFields' => array
             (
                 'value' => array
                 (
                     'label'     => &$GLOBALS['TL_LANG']['tl_content']['tabs_nav']['value'],
                     'inputType' => 'text',
                     'eval'      => array('class'=>'tl_text_2'),
                 ),
                 'label' => array
                 (
                     'label'     => &$GLOBALS['TL_LANG']['tl_content']['tabs_nav']['label'],
                     'inputType' => 'text',
                     'eval'      => array('class'=>'tl_text_2'),
                 ),
                 'is_active' => array
                 (
                     'label'     => &$GLOBALS['TL_LANG']['tl_content']['tabs_nav']['is_active'],
                     'inputType' => 'checkbox',
                     'eval'      => array('columnPos'=>2),
                 )
             ),
         ),
         'sql'                   => "blob NULL",
     ),
     
'tabs_align' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['tabs_align'],
   			'default'                 => '',
   			'options'=>array('horizontal','vertical'),
   			'exclude'                 => true,
   		
   			'inputType'               => 'select',
   		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
   			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['tabs_align_options'],
   			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   			'sql'                     => "varchar(255) NOT NULL default ''"
   		),
   //LISTSTYLE
'list_style_type' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['list_style_type'],
   			'default'                 => '',
   			'options'=>array(' ','no-bullet', 'square', 'circle','disc'),
   			'exclude'                 => true,

   			'inputType'               => 'select',
   		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
   			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['list_style_type_options'],
   			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   			'sql'                     => "varchar(255) NOT NULL default ''"
   		),
   //Definition List  
  'def_list' => array
     		(
     			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['def_list'],
     		'exclude'               => true,
     		    'inputType'             => 'multiColumnWizard',
     		    'eval' => array
     		    (
     		        'tl_class'          => 'clr',
     		        'columnFields' => array
     		        (
     		            'title' => array
     		            (
     		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['def_list']['title'],
     		                'inputType' => 'text',
     		                'eval'      => array('class'=>'tl_text_3'),
     		            ),
     		            'definition' => array
     		            (
     		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['def_list']['definition'],
     		                'inputType' => 'textarea',
     		                'eval'      => array('class'=>'tl_text_2'),
     		            ),
     		            'class' => array
     		            (
     		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['def_list']['class'],
     		                'inputType' => 'text',
     		                'eval'      => array('class'=>'tl_text_3'),
     		            )
     		        ),
     		    ),
     		    'sql'                   => "blob NULL",
     		), 
     //Price Table 
     'price_table' => array
        		(
        			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['price_table'],
        		'exclude'               => true,
        		'default'=>'a:7:{i:0;a:2:{s:7:"content";s:16:"Foundation Theme";s:5:"class";s:5:"title";}i:1;a:2:{s:7:"content";s:10:"199,99 €";s:5:"class";s:5:"price";}i:2;a:2:{s:7:"content";s:11:"Top Angebot";s:5:"class";s:11:"description";}i:3;a:2:{s:7:"content";s:20:"5 Responsive Layouts";s:5:"class";s:11:"bullet-item";}i:4;a:2:{s:7:"content";s:20:"20 erweiterte Module";s:5:"class";s:11:"bullet-item";}i:5;a:2:{s:7:"content";s:3:"...";s:5:"class";s:11:"bullet-item";}i:6;a:2:{s:7:"content";s:17:"Angebot anfordern";s:5:"class";s:10:"cta-button";}}',
        		    'inputType'             => 'multiColumnWizard',
        		    'eval' => array
        		    (
        		        'tl_class'          => 'clr',
        		        'columnFields' => array
        		        (
        		           
        		            'content' => array
        		            (
        		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['price_table']['content'],
        		                'inputType' => 'textarea',
        		                'eval'      => array('class'=>'tl_text_2'),
        		            ),
        		            'class' => array
        		            (
        		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['price_table']['class'],
        		                'inputType' => 'text',
        		                'eval'      => array('class'=>'tl_text_3'),
        		            )
        		        ),
        		    ),
        		    'sql'                   => "blob NULL",
        		),
        'cta_href' => array
        (
        	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cta_href'],
        	//'exclude'                 => true,
        	'search'                  => true,
        	'inputType'               => 'text',
        	'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
        	'wizard' => array
        	(
        		array('tl_ftc_content', 'pagePicker')
        	),
        		'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        
        //buttonlist or Linklist
        'btn_name' => array
        (
        	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_name'],
        	//'exclude'                 => true,
        	'search'                  => true,
        	'inputType'               => 'text',
        	'eval'                    => array('rgxp'=>'extnd', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 '),
        	
        		'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'list_links' => array
           		(
           			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['list_links'],
           		'exclude'               => true,
           		'default'=>'',
           		    'inputType'             => 'multiColumnWizard',
           		    'eval' => array
           		    (
           		        'tl_class'          => 'clr',
           		        'columnFields' => array
           		        (
           		           
           		            'content' => array
           		            (
           		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['list_links']['content'],
           		                'inputType' => 'text',
           		                'eval'      => array('class'=>'tl_text_2'),
           		            ),
           		            'href' => array
           		            (
           		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['list_links']['href'],
           		                'inputType' => 'text',
           		                'eval'      => array('class'=>'tl_text_3','rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
           		                'wizard' => array
           		                (
           		                	array('tl_ftc_content', 'pagePicker')
           		                )
           		            ),
           		            'class' => array
           		            (
           		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['list_links']['class'],
           		                'inputType' => 'text',
           		                'eval'      => array('class'=>'tl_text_3'),
           		            )
           		        ),
           		    ),
           		    'sql'                   => "blob NULL",
           		),
   //Buttons settings
'btn_size' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_size'],
   			'default'                 => '',
   			'options'=>array(' ','tiny','small','large'),
   			'exclude'                 => true,
   		
   			'inputType'               => 'select',
   		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
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
     		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
     			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['btn_styles_options'],
     			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
     			'sql'                     => "varchar(255) NOT NULL default ''"
     		),
     'btn_split' => array
     (
     	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_split'],
     	'exclude'                 => true,
     	'inputType'               => 'checkbox',
     	'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50 clr'),
     	'sql'                     => "char(1) NOT NULL default ''"
     ),
   //Dropdown
   'drop_align' => array
      		(
      			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['drop_align'],
      			'default'                 => '',
      			'options'=>array(' ','top','down','left','right'),
      			'exclude'                 => true,
      		
      			'inputType'               => 'select',
      		//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
      			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['drop_align_options'],
      			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
      			'sql'                     => "varchar(255) NOT NULL default ''"
      		),  
      //open modal with btn
      'use_reveal' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['use_reveal'],
      	'exclude'                 => true,
      	'inputType'               => 'checkbox',
      	'eval'                    => array('submitOnChange'=>true),
      	'sql'                     => "char(1) NOT NULL default ''"
      ),
      'modal_id' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['modal_id'],
      	'exclude'                 => true,
      	'inputType'               => 'text',
      	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
      	'sql'                     => "varchar(255) NOT NULL default ''"
      ),
      'alert_kind' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['alert_kind'],
      		'default'                 => '',
      		'options'=>array('info','secondary','success','warning','alert'),
      		'exclude'                 => true,
      	
      		'inputType'               => 'select',
      	//	'options_callback'        => array('tl_content', 'getSmallOpitons'),
      		'reference'               => &$GLOBALS['TL_LANG']['tl_content']['alert_kind'],
      		'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
      		'sql'                     => "varchar(64) NOT NULL default ''"
      ),
      'alert_style' => array
      (
         'label'                   => &$GLOBALS['TL_LANG']['tl_content']['alert_style'],
         	'default'                 => '',
         	'options'=>array(' ','round','radius'),
         	'exclude'                 => true,
         
         	'inputType'               => 'select',
        
         	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['alert_style'],
         	'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
         	'sql'                     => "varchar(64) NOT NULL default ''"
      ),
      'alert_txt' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_name'],
      	//'exclude'                 => true,
      	'search'                  => true,
      	'inputType'               => 'textarea',
      	'eval'                    => array('rgxp'=>'extnd', 'decodeEntities'=>true, 'maxlength'=>2000, 'tl_class'=>'clr long m12'),
      	
      		'sql'                     => "varchar(2000) NOT NULL default ''"
      ),
      
      //joyride
      'joyride' => array
             (
                 'label'                 => &$GLOBALS['TL_LANG']['tl_content']['joyride'],
                 'exclude'               => true,
                 'inputType'             => 'multiColumnWizard',
                 'default' =>'a:3:{i:0;a:5:{s:2:"id";s:7:"btn_480";s:5:"class";s:0:"";s:3:"txt";s:5:"Start";s:7:"content";s:34:"<h4>#Stop1</h4><p>Some Content</p>";s:7:"options";s:35:"tip_location:top;tip_animation:fade";}i:1;a:5:{s:2:"id";s:10:"article-68";s:5:"class";s:5:"alert";s:3:"txt";s:10:"Next Modal";s:7:"content";s:34:"<h4>#Stop2</h4><p>Some Content</p>";s:7:"options";s:64:"tip_location:left;tip_animation:fade; expose_add_class : \'alert\'";}i:2;a:5:{s:2:"id";s:10:"article-70";s:5:"class";s:0:"";s:3:"txt";s:3:"End";s:7:"content";s:34:"<h4>#Stop3</h4><p>Some Content</p>";s:7:"options";s:18:"tip_location:right";}}',
                 'eval' => array
                 (
                     'tl_class'          => 'clr ',
                     'columnFields' => array
                     (
                         'id' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['joyride']['id'],
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_3'),
                             
                         ),
                    
                         'txt' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['joyride']['txt'],
                             
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_3'),
                             
                         ),
                         'content' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['joyride']['content'],
                             
                             'inputType' => 'textarea',
                             'eval'      => array('allowHtml'=>true,'class'=>'tl_text_1'),
                             
                         ),
                         'options' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['joyride']['options'],
                             
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_2','allowHtml'=>true),
                             
                         )
                         
                     ),
                 ),
                 'sql'                   => "blob NULL",
             ), 
     'btn_hover' => array
     (
     	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['btn_hover'],
     	'exclude'                 => true,
     	'inputType'               => 'checkbox',
     	'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
     	'sql'                     => "char(1) NOT NULL default ''"
     ),
    //Blockquote
    'blockquote' => array
    (
    	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['blockquote'],
    	'exclude'                 => true,
    	'inputType'               => 'textarea',
    	'eval'                    => array('maxlength'=>2000, 'tl_class'=>'long'),
    	'sql'                     => "varchar(2000) NOT NULL default ''"
    ),
    'cite' => array
    (
    	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cite'],
    	'exclude'                 => true,
    	'inputType'               => 'text',
    	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
    	'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    
    //VCard
    'vcard' => array
       		(
       			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['vcard'],
       		'exclude'               => true,
       		'default'=>'a:6:{i:0;a:2:{s:7:"content";s:17:"Monique Hahnefeld";s:5:"class";s:2:"fn";}i:1;a:2:{s:7:"content";s:13:"Austraße 138";s:5:"class";s:14:"street-address";}i:2;a:2:{s:7:"content";s:18:"Baden-Würthemberg";s:5:"class";s:8:"locality";}i:3;a:2:{s:7:"content";s:9:"Stuttgart";s:5:"class";s:5:"state";}i:4;a:2:{s:7:"content";s:5:"70376";s:5:"class";s:3:"zip";}i:5;a:2:{s:7:"content";s:25:"info@monique-hahnefeld.de";s:5:"class";s:5:"email";}}',
       		    'inputType'             => 'multiColumnWizard',
       		    'eval' => array
       		    (
       		        'tl_class'          => 'clr',
       		        'columnFields' => array
       		        (
       		           
       		            'content' => array
       		            (
       		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['vcard']['content'],
       		                'inputType' => 'textarea',
       		                'eval'      => array('class'=>'tl_text_2'),
       		            ),
       		            'class' => array
       		            (
       		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['vcard']['class'],
       		                'inputType' => 'text',
       		                'eval'      => array('class'=>'tl_text_3'),
       		            )
       		        ),
       		    ),
       		    'sql'                   => "blob NULL",
       		),
       	//video	
      'video_src' => array
             (
                 'label'                 => &$GLOBALS['TL_LANG']['tl_content']['video_src'],
                 'exclude'               => true,
                 'inputType'             => 'multiColumnWizard',
                 'default' =>'a:3:{i:0;a:2:{s:4:"mime";s:9:"video/mp4";s:3:"src";s:0:"";}i:1;a:2:{s:4:"mime";s:9:"video/ogg";s:3:"src";s:0:"";}i:2;a:2:{s:4:"mime";s:10:"video/webm";s:3:"src";s:0:"";}}',
                 'eval' => array
                 (
                     'tl_class'          => 'clr ',
                     'columnFields' => array
                     (
                         'mime' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['video_src']['mime'],
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_3'),
                         ),
                         'src' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['video_src']['src'],
                             'inputType'               => 'fileTree',
                             'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'tl_text_1'),
                           
                         )
                     ),
                 ),
                 'sql'                   => "blob NULL",
             ),
      'track_src' => array
             (
                 'label'                 => &$GLOBALS['TL_LANG']['tl_content']['track_src'],
                 'exclude'               => true,
                 'inputType'             => 'multiColumnWizard',
                 'default' =>'a:2:{i:0;a:3:{s:4:"kind";s:8:"captions";s:3:"src";s:0:"";s:4:"lang";s:2:"de";}i:1;a:3:{s:4:"kind";s:8:"captions";s:3:"src";s:0:"";s:4:"lang";s:2:"en";}}',
                 'eval' => array
                 (
                     'tl_class'          => 'clr ',
                     'columnFields' => array
                     (
                         'kind' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['track_src']['kind'],
                             'inputType' => 'select',
                             'options'=>array('captions',
                             'chapters',
                            'descriptions',
                             'metadata',
                             'subtitles'),
                             'eval'      => array('class'=>'tl_text_2'),
                             	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['track_src_options'],
                         ),
                         'src' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['track_src']['src'],
                             'inputType'               => 'fileTree',
                             'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'tl_text_1'),
                           
                         ),
                         'lang' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['track_src']['lang'],
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_4'),
                         ),
                     ),
                 ),
                 'sql'                   => "blob NULL",
             ),  
             
         'flash_player_src' => array
         (
             'label'     => &$GLOBALS['TL_LANG']['tl_content']['flash_player_src'],
             'exclude'                 => true,
             'inputType'               => 'fileTree',
             'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'w50'),
             'sql'                     => "binary(16) NULL"
           
         ), 
        'flash_video_src' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_content']['flash_video_src'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'w50'),
            'sql'                     => "binary(16) NULL"
          
        ), 
        //flexvideo
    	'youtube_vimeo_id' => array
    	(
    		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['youtube_vimeo_id'],
    		'exclude'                 => true,
    		'inputType'               => 'text',
    		'eval'                    => array('rgxp'=>'url', 'mandatory'=>true),
    		'sql'                     => "varchar(16) NOT NULL default ''"
    	),
       'use_youtube' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['use_youtube'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'vimeo' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['vimeo'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'own_src' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['own_src'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'progress_size' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['progress_size'],
       	'exclude'                 => true,
       	'inputType'               => 'text',
       	'eval'                    => array('placeholder'=>'1-100%','maxlength'=>32, 'tl_class'=>'clr w50'),
       	'sql'                     => "varchar(32) NOT NULL default ''"
       ),
       //placeholder
       'is_bw' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['is_bw'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'stamp' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['stamp'],
       	'exclude'                 => true,
       	'inputType'               => 'text',
       	'eval'                    => array('placeholder'=>'designs2','maxlength'=>255, 'tl_class'=>'clr w50'),
       	'sql'                     => "varchar(255) NOT NULL default 'designs2'"
       ),
       'topic' => array
       (
          'label'                   => &$GLOBALS['TL_LANG']['tl_content']['topic'],
          	'default'                 => '',
          	'options'=>array(' ','abstract','animals','business','cats','city','food','night','life','fashion','people','nature','sports','technics','transport'),
          	'exclude'                 => true,
          	'inputType'               => 'select',
         
          	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['topic_options'],
          	'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
          	'sql'                     => "varchar(64) NOT NULL default ''"
       ),
       //Magellan 
       'magellan_nav' => array
          		(
          			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['magellan_nav'],
          		'exclude'               => true,
          		'default'=>'',
          		    'inputType'             => 'multiColumnWizard',
          		    'eval' => array
          		    (
          		        'tl_class'          => 'clr',
          		        'columnFields' => array
          		        (
          		           'alias' => array
          		           (
          		               'label'     => &$GLOBALS['TL_LANG']['tl_content']['magellan_nav']['alias'],
          		               'inputType' => 'text',
          		               'eval'      => array('class'=>'tl_text_3'),
          		           ),
          		            'content' => array
          		            (
          		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['magellan_nav']['content'],
          		                'inputType' => 'text',
          		                'eval'      => array('class'=>'tl_text_2'),
          		            ),
          		            'class' => array
          		            (
          		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['magellan_nav']['class'],
          		                'inputType' => 'text',
          		                'eval'      => array('class'=>'tl_text_3'),
          		            )
          		        ),
          		    ),
          		    'sql'                   => "blob NULL",
          		)
		      
		   
	   
	  ));
	  $GLOBALS['TL_DCA']['tl_content']['fields']['playerSize']['default']='a:2:{i:0;s:3:"640";i:1;s:3:"480";}';
	 $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback']   = array('tl_ftc_content', 'addCteType');

	  
	  //var_dump($GLOBALS['TL_DCA']['tl_content']['fields']['text']);
	  
class tl_ftc_content extends \tl_content
{	  
	  
	  
	  
	  //pagepicker
	  public function pagePicker(DataContainer $dc)
	  {
	  	return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	  }
	/**
		 * Add the type of content element
		 * @param array
		 * @return string
		 */
		public function addCteType($arrRow)
		{
			$key = $arrRow['invisible'] ? 'unpublished' : 'published';
			$type = $GLOBALS['TL_LANG']['CTE'][$arrRow['type']][0] ?: '&nbsp;';
			$class = 'limit_height';
			$data= '';
			$headline=unserialize($arrRow['headline']);
			$CssID= unserialize($arrRow['cssID']);
			$CssClass= ' ce_'.$arrRow['type'].' '.$CssID[1].' '.$arrRow['small_ftc'].' '.$arrRow['large_ftc'].' '.$arrRow['float_ftc'].' '.$this->splitArr($arrRow['align_ftc']).' ';
			
			if (!in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop'])){
			
				$data .=  '<span class="data" > ';
				
				if ($arrRow['data_attr']==''&&$arrRow['row_data_attr_ftc']=='') {
				}else {
					$data .=  'ATTR: '.$this->splitArr($arrRow['data_attr']).' '.$this->splitArr($arrRow['row_data_attr_ftc']).' |';
				}
				if ($CssID[0]!==''){				
					$data .= ' ID: '.$CssID[0].' |';
				}
				
				$data .= ' CLASS: '.$CssClass;
				
				$data .='</span>';
			}else {
				$headline['value']='';
			}
			// Remove the class if it is a wrapper element
			if (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['start']) || in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['separator']) || in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop']))
			{
				$class = '';
	
				if (($group = $this->getContentElementGroup($arrRow['type'])) !== null)
				{
					$type = $GLOBALS['TL_LANG']['CTE'][$group] . ' ' . $type . ' ';
				}
			}
	
			// Add the group name if it is a single element (see #5814)
			elseif (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['single']))
			{
				if (($group = $this->getContentElementGroup($arrRow['type'])) !== null)
				{
					$type = $GLOBALS['TL_LANG']['CTE'][$group] . ' ' . $type . ' ';
				}
			}
	
			// Add the ID of the aliased element
			if ($arrRow['type'] == 'alias')
			{
				$type .= ' ID ' . $arrRow['cteAlias'];
			}
	
			// Add the protection status
			if ($arrRow['protected'])
			{
				$type .= ' ' . $GLOBALS['TL_LANG']['MSC']['protected'] . ' ';
			}
			elseif ($arrRow['guests'])
			{
				$type .= ' ' . $GLOBALS['TL_LANG']['MSC']['guests'] . ' ';
			}
	
			// Add the headline level (see #5858)
			if ($arrRow['type'] == 'headline')
			{
				if (is_array(($headline = deserialize($arrRow['headline']))))
				{
					$type .= ' ' . $headline['unit'] . ' ';
				}
			}
	
			// Limit the element's height
			if (!Config::get('doNotCollapse'))
			{
				$class .=  ' h64';
			}
//	var_dump($arrRow);
//	exit;
			return '
	<div class="cte_type ' . $key . $CssClass.'">' . $type . '</div>
	<div class="' . trim($class) . '">'.$data.'<span class="headline">'.$headline['value'].'</span>
	' . $this->getContentElement($arrRow['id']) . '
	</div>' . "\n";
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