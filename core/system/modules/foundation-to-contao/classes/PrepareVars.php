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
		//var_dump($template);
      		switch($template) {
      		
      		case 'ce_headline':
      		case 'ce_text':
      		case 'ce_image':
      		case 'ce_list':
      		case 'mod_article':
      		case 'mod_navigation':
      		case 'mod_breadcrumb':
      		case 'mod_search':
      		case 'ce_download':
      		case 'ce_downloads':
      		case 'ce_hyperlink':
      		case 'ce_hyperlink_image':
      		case 'ce_toplink':
      		$obj->setName($template.'_ftc');
      		//var_dump($template);
			break;
      		default:
    		}  		
					
	     
	 } 	
		
		//getContentElement
	public function elements($objRow, $strBuffer, $objElement)    {   
		
		// $objRow->type is the type of the Element e.g. 'row_start'
		/* $objElement */ 
		if($objRow->type=='module'){
			//var_dump($strBuffer);
			
			$NewBuffer = $this->design_modules($objRow);
			$strBuffer = (!$NewBuffer)?$strBuffer:$NewBuffer;
		return $strBuffer;
		
		}
		if ($objRow->type=='form') {
		//var_dump($objRow);
		
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
     
          
       //getArticle
	 public function articles($objRow)    {   
		if(!is_array(unserialize($objRow->aktiv_preset_ftc))){ 
		return $objRow; 		
			}else{
		$akt_preset=unserialize($objRow->aktiv_preset_ftc)[0];		
			
		}
		$ftc_classes = $this->getGridVars($akt_preset,$objRow->add_custom_settings,$objRow->custom_preset_ftc);
		//var_dump($objRow->aktiv_preset_ftc,'n');
		//$objRow->data_attr = $this->splitArr($objRow->data_attr_ftc);
		$objRow->cssID = unserialize($objRow->cssID);
		$objRow->ftc_classes = trim('mod_article '.$objRow->cssID[1]).' '.$ftc_classes;
		$objRow->ftcID = ($objRow->cssID[0] != '') ? ' id="' . $objRow->cssID[0] . '"' : ' id="' . $objRow->alias . '"';
		
		return $objRow; 
		
	 } 
          //outputFrontendTemplate, $strContent, $strTemplate
           // getFrontendModule
     public function modules($objRow, $strBuffer, $objModule)    {   
 		 		
		switch ($objRow->type) {
			case 'navigation':
			case 'customnav':
			case 'search':
			case 'breadcrumb':
			case 'topbar':
			case 'offcanvas':
			case 'offcanvasjq':
			case 'multitogglejq':
			$key = $objRow->type;
			//get the registrated Classname
			$strClass = 'Module'.strtoupper(substr($key, 0, 1)).substr($key, 1, (strlen($key))-1); 
			//var_dump($strClass );
			$objEl = new $strClass($objRow);
			
			$ftc_classes = $this->getGridVars(unserialize($objRow->aktiv_preset_ftc)[0],$objRow->add_custom_settings,$objRow->custom_preset_ftc);

			
			$objEl->cssID = unserialize($objRow->cssID);
			$objEl->ftc_classes = trim($objRow->typePrefix.$objRow->type.' '.$objEl->cssID[1]).' '.$ftc_classes;
			$objEl->ftcID = ($objEl->cssID[0] != '') ? ' id="' . $objEl->cssID[0] . '"' : '';
			
			
			$strBuffer = $objEl->generate();
			
			if ($objRow->type=='offcanvasjq') {
			//echo'<pre>';var_dump($objRow);
			}
			unset($objEl);
			
			break;
			default:
			break;
		}
	
 		
 		return $strBuffer; 
   
      } 
                      
     
     public function design_elements($el){
          
     //FTC Classes 
     $ftc_classes = $this->getGridVars(unserialize($el->aktiv_preset_ftc)[0],$el->add_custom_settings,$el->custom_preset_ftc);
     //$objRow->data_attr = $this->splitArr($objRow->data_attr_ftc);
    // $el->cssID = unserialize($el->cssID);
     $el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]).' '.$ftc_classes;
     $el->ftcID = ($el->cssID[0] != '') ? ' id="' . $el->cssID[0] . '"' : '';
     
     
     $el->data_attr = $this->splitArr($el->data_attr_ftc);
     
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
     	$el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]);
     	$el->row_data_attr_ftc = $this->splitArr($el->row_data_attr_ftc);
     	break;
     	case 'tab_start':
     	case 'tab_start_inside':
     	$el->tabs_align = $el->tabs_align;
     	break;
     	case 'form':
     	
     	break;
     	
     	default:
     	
    	}
     
     unset($ftc);
     //var_dump($el->class);
     return $el;
     }
     
     
     public function design_modules($el){
               
          $elModel = \ModuleModel::findByID($el->module);
          
          switch($elModel->type) {
          	case 'customnav':
          	case 'navigation':
          	case 'offcanvas':
			case 'search':
          	$strClass = 'Module'.strtoupper(substr($elModel->type, 0, 1)).substr($elModel->type, 1, (strlen($elModel->type))-1); 
          			
          	$elModul = new $strClass($elModel);
          	
          	$el->cssID = unserialize($el->cssID);
          	$ftc_classes = $this->getGridVars(unserialize($el->aktiv_preset_ftc)[0],$el->add_custom_settings,$el->custom_preset_ftc);
   
          	$elModul->ftc_classes = trim('mod_'.$elModel->type.' '.$el->cssID[1]).' '.$ftc_classes;
          	$elModul->ftcID = ($el->cssID[0] != '') ? ' id="' . $el->cssID[0] . '"' : '';
			//echo'<br>';
//			$el->Template = new \FrontendTemplate('mod_'.$el->type.'_ftc');
//			$el->Template->setData($el);
	
			//$el->compile();
			//var_dump('--- ',$el->ftc_classes,$el->ftcID);
			//$el->strTemplate = $el->strTemplate.'_ftc';
			//echo'<br>';
			$strBuffer = $elModul->generate();
			return $strBuffer;
         
          
          	break;
          	
          	default:
          	return false;
         	}
          
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
     
     public function getGridVars($preset,$add_custom,$custom_preset){
     
     $ftc = array();
     $GridArr = explode(',','small,medium,large,xlarge,xxlarge,pull,push');
     if ($add_custom=='1') {$preset = $custom_preset;}
     $preset = (!is_array($preset))?unserialize($preset):$preset;
     
     foreach ($GridArr as $v) {
     if (isset($preset[$v])&&$preset[$v]!=='-') {
     	$ftc[$v] = $v.'-'.$preset[$v];
     }
     	
     }
     //var_dump(count($ftc));
     $ftc['columns'] = (count($ftc)==0)?'':$ftc_classes.' columns';
     //FTC Classes 
     $ftc['float_ftc'] = ($preset['float_ftc']!=='-')?$preset['float_ftc']:'';
     
     $ftc['align'] = ($preset['align']!==NULL)?$this->splitArr($preset['align']):'';
     $ftc['custom'] = ($preset['custom']!==NULL)?$preset['custom']:'';
     
    
     $ftc_classes = trim(implode(' ',$ftc));
     unset( $preset);
     return $ftc_classes;
     
     }
     
     
     public function splitArr($arr){
     
     $str='';
     $arr = (!is_array($arr))?unserialize($arr):$arr;
     	if ($arr==''||!is_array($arr)) {
     		return;
     	}
     	foreach ($arr as $class) {
     		if ($class==''||$class=='-') {
     			return;
     		}
     		$str.=' '.$class;
     	}
     	return $str;
     }
     
     
     
}
