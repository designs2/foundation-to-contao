<?php  
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @copyright 2014 Monique Hahnefeld
 */
 
namespace MHAHNEFELD\FTC;


class PrepareVars extends \Controller
{
		
		
	//parseFrontendTemplate
	public function templates($obj){   
		
		$template = $obj->getName();
		
      		switch($template) {
      		
      		case 'ce_headline':
      		case 'ce_text':
      		case 'ce_list':
      		//echo'<pre>XXX';
      		$obj->setName($template.'_ftc');
			break;
      		default:
    		}  		
					
	     
	 } 	
		
		//getContentElement
	public function elements($objRow, $strBuffer, $objElement)    {   
		
		// $objRow->type is the type of the Element e.g. 'row_start'
		//var_dump($GLOBALS['objPage']);
	
		/* $objElement */ 
		
		if ($objRow->type=='form') {
		
		
			$this->design_elements($objRow);
			
			}else {
			$strClass = $this->findContentElement($objRow->type); //get the registrated Classname
			$objEl = new $strClass($objRow);
			
			$this->design_elements($objEl);
			$strBuffer = $objEl->generate();
			
		}
		
				
		
		unset($objEl);
		
		return $strBuffer; 
			
         
     } 
     //compileFormFields
     public function forms($arrFields, $formId)    {   

    		foreach ($arrFields as $k => $field) {
    		$this->design_fields($field);
    		
			}
    		return $arrFields; 
 
        } 
     
     
     
       //loadFormField
      protected function ffl($objWidget,$strForm, $arrForm)    {   
          		
          		// set templates ftc
          		echo '<pre>';
          	
          		//Svar_dump($arrForm);
          		$strClass = new \FormFieldset($objWidget);
          		$strClass->strTemplate ='test';
          			
          	
          		echo '<br>';
          		//var_dump($arrData);
          		//$objWidget = $strClass->parse();
var_dump($objWidget);
         		return $objWidget; 
          			
                   
           }
           // getFrontendModule
       //getArticle
	    public function articles($objArticle, $strBuffer)    {   
	
//	   		foreach ($arrFields as $k => $field) {
//	   		$this->design_fields($field);
//	   		
//				}
//	   		return $arrFields; 
//	
	       } 
          //outputFrontendTemplate
       public function modules($strContent, $strTemplate)    {   
  
//      		foreach ($arrFields as $k => $field) {
//      		$this->design_fields($field);
//      		
//  			}
//      		return $arrFields; 
   
          } 
                      
     
     public function design_elements($el){
     
     $ftc = array();
     
     //FTC Classes 
     $ftc['align'] = $this->splitArr($el->align_ftc);
     $ftc['data_attr'] = $this->splitArr($el->data_attr_ftc);
     $ftc['classes'] = $el->small_ftc.' '.$el->large_ftc.' '.$el->float_ftc.' '. $ftc['align'].' columns';
     
     $el->data_attr = $ftc['data_attr'];
     $el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]).' '.$ftc['classes'];
     $el->ftcID = ($el->cssID[0] != '') ? ' id="' . $el->cssID[0] . '"' : '';
     //var_dump($el->id,$el->type);
   //  echo'<br><pre>';
     switch($el->type) {
     	case 'progress_bar':
     	$el->ftc_classes .= $this->splitArr($el->btn_styles);
     	$el->ftcID = ' id="progressbar_' . $el->id.'" ';
     	break;
     	case 'alert_box':
     	$el->ftc_classes .= ' alert-box '.$el->alert_kind.' '.$el->alert_styles;
     	$el->ftcID = ' id="alert_'.$el->id.'" ';
     	break;
     	case 'magellan_nav':
     	$el->ftcID = ' id="magellan_'.$el->id.'" ';
     	break;
     	case 'magellan_stop':
     	$el->ftcID = trim($el->cssID[0]);
     	break;
     	case 'reveal_modal_start':
     	$el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]);
     	break;
     	case 'row_start':
     	$el->row_data_attr_ftc = $this->splitArr($el->row_data_attr_ftc);
     	break;
     	case 'tab_start':
     	case 'tab_start_inside':
     	$el->tabs_align = $el->tabs_align;
     	break;
     	case 'form': //form
     	//var_dump($el);
     	//$form=$this->getForm($el->id);
     	//var_dump($form);
     	
     	
     	break;
     	
     	default:
     	
    	}
     
     unset($ftc);
     //var_dump($el->class);
     return $el;
     }
     
     public function design_fields($el){
     
     $ftc = array();
     
     //FTC Classes 
     $ftc['align_field'] = $this->splitArr($el->align_ftc);
     $ftc['align_label'] = $this->splitArr($el->label_align_ftc);
     $ftc['style_label'] = $this->splitArr($el->label_classes);
     $ftc['classes_field'] = $el->small_ftc.' '.$el->large_ftc.' '.$el->float_ftc.' '.$ftc['align_field'].' columns';
     $ftc['classes_fix'] = $el->label_small_ftc.' '.$el->label_large_ftc.' '.$el->label_float_ftc.' '.$ftc['align_label'].' columns';
     
     
     $ftc['data_attr'] = $this->splitArr($el->data_attr_ftc);
  
     $el->class = $strClass;
     $el->ftc_field_classes = $ftc['classes_field'];
     $el->ftc_fix_classes = $ftc['classes_fix'];
     $el->label_style = $ftc['style_label'];
	
	//var_dump($el->type);
	switch($el->type) {
		case 'range_slider':
		$el->rs_id = 'range_value_'.$el->id;
		$el->ftc_rs_classes = $ftc['align_field'] = $this->splitArr($el->rs_classes);
		break;
		case 'submit':
		$ftc['button_classes'] = $this->splitArr($el->btn_styles).' '.$el->btn_size;
		$el->btn_classes = $ftc['button_classes'];
		break;
		case 'select':
		//echo('<pre>');
		
		//var_dump(unserialize($el->options));
		$arrOptions = unserialize($el->options);
		
		$el->arrOptions = $this->getOptions($arrOptions);
		break;
		
		default:
		}
   
     
     unset($ftc);
     //var_dump($el->class);
     return $el;
     }
     public function getOptions($arr) {
     $arrOption = array();
     // Generate options
     		foreach ($arr as $arrOption)
     		{
     			if ($arrOption['group'])
     			{
     				if ($blnHasGroups)
     				{
     					$arrOptions[] = array
     					(
     						'type' => 'group_end'
     					);
     				}
     
     				$arrOptions[] = array
     				(
     					'type'  => 'group_start',
     					'label' => specialchars($arrOption['label'])
     				);
     
     				$blnHasGroups = true;
     			}
     			else
     			{
     				$arrOptions[] = array
     				(
     					'type'     => 'option',
     					'value'    => $arrOption['value'],
     					'selected' =>($arrOption['default'])? 'selected':'',
     					'label'    => $arrOption['label'],
     				);
     			}
     		}
     
     		if ($blnHasGroups)
     		{
     			$arrOptions[] = array
     			(
     				'type' => 'group_end'
     			);
     		}
     	return $arrOptions;
     }
     
     public function splitArr($arr){
     $str='';
     	if ($arr==''||!is_array(unserialize($arr))) {
     		return;
     	}
     	foreach (unserialize($arr) as $class) {
     		if ($class=='') {
     			return;
     		}
     		$str.=' '.$class;
     	}
     	return $str;
     }
     
     
     
}