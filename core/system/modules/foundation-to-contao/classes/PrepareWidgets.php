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


class PrepareWidgets extends \Widget
{
	
     
       //loadFormField
      public function ffl($objWidget,$strForm, $arrForm){   
          		
          // get templates ftc
          	$template = $objWidget->__get('template');


      	switch($template) {
      		case 'form_radio':
      		case 'form_checkbox':
      		$objWidget->arrOptions = $this->getOpt($objWidget);
      		$objWidget->__set('template',$template.'_ftc');
      		break;
      		case 'form_html': //fieldset
      		$objWidget->__set('template','form_fieldset_ftc');
      		break;
      		case 'form_headline':
      		case 'form_explanation':
      		case 'form_text':
      		case 'form_password':
      		case 'form_textarea':
      		case 'form_select':
      		case 'form_upload':
      		case 'form_captcha':
      		case 'form_select':
      		case 'form_submit':
      			$objWidget->__set('template',$template.'_ftc');
      		break;
      		case 'form_widget':
      			$type = $objWidget->__get('type');
      			$strClass = $GLOBALS['TL_FFL'][$type];
      			$objWidgetNew = new $strClass($objWidget);
      			switch ($type) {
      			case 'text':
      			$objWidget->__set('template','form_textfield_ftc');
      			break;
      			case 'textarea':
      			$objWidget->__set('template','form_textarea_ftc');
      			break;
      			case 'select':
      			$objWidget->__set('template','form_select_ftc');
      			break;
      			default:
      			}
      			unset($objWidgetNew);
      		break;
      		default:
      			
      	}
    

        return $objWidget; 
          			
                   
     }
       
            
     
     /**
      * Generate the widget and return it as string
      * @return string
      */
     public function generate(){}    
     
     public function getOpt($arr) {
     $arrOptions = array();

   
     // Generate options from Checkbox
     foreach ($arr->arrOptions as $i =>$arrOpt)
     {
    	
     	$arrOptions[] = array
     	(
     	
     		'name'       => $arr->strName . ((count($arr->arrOptions) > 1&&$arr->strName!=='radio') ? '[]' : ''),
     		'id'         => $arr->strId . '_' . $i,
     		'value'      => $arrOpt['value'],
     		'checked'    => trim($this->isChecked($arrOpt)),
     		'attributes' => $arr->getAttributes(),
     		'label'      => $arrOpt['label']
     	);
     }
      // Generate options Radio
     	return $arrOptions;
     }
     
     
}