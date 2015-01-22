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
   // var_dump($template);
      switch($template) {
          
          case 'fe_page':
           case 'fe_page_multitoggle':
           $obj->setName($template.'_ftc');
          case 'fe_page_multitoggle_ftc':
          case 'fe_page_multitoggle_product':
          case 'fe_page_ftc':
            if($obj->layout->__get("addFoundation")=='1'){

              $obj->__get("layout")->__set("gridCSS",(array)$this->getGridArr($obj->layout));
              $obj->__get("layout")->__set("ftcLib",(string)$this->getLibStr($obj->layout));
              $obj->__get("layout")->__set("ftcJS",(string)$this->getScriptStr($obj->layout));
              /* hack for other extensions whitch ask if mootools or jquery */
              $obj->__get("layout")->__set("addJQuery","1");
             
          //  var_dump('test',$obj->layout);
            }
            break;
          case 'ce_headline':
          case 'ce_teaser':
          case 'ce_text':
          case 'ce_image':
          case 'ce_list':
          case 'mod_article':
          case 'mod_article_teaser':
          case 'mod_navigation':
          case 'mod_breadcrumb':
          case 'mod_search':
          case 'mod_password':
          case 'mod_login_1cl':
          case 'mod_login_2cl':
          case 'form':
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
      
      $NewBuffer = $this->design_modules($objRow);
      $strBuffer = (!$NewBuffer)?$strBuffer:$NewBuffer;
    return $strBuffer;
    
    }else
    if ($objRow->type=='form') {

      $strClass = $this->findContentElement($objRow->type); 
      $objEl = new $strClass($objRow);
      $this->design_elements($objRow);
      $objEl->cssID = $objRow->cssID;
      $objEl->ftc_classes = $objRow->ftc_classes;
      $objEl->ftcID = $objRow->ftcID;
      $objEl->data_attr = $objRow->data_attr;

      $strBuffer = $objEl->generate();

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
  public function forms($arrFields, $formId){   

    foreach ($arrFields as $k => $field) {
    $this->design_fields($field);
    }
    
    return $arrFields; 
 
  } 
          
  //getArticle
  public function articles($objRow){   
      $objRow->cssID = unserialize($objRow->cssID);

      if(!is_array(unserialize($objRow->ftc_preset_full))){ 
        $akt_preset=array();

        $objRow->ftcID = ($objRow->cssID[0] !== '') ? ' id="' . $objRow->cssID[0] . '"' : ' id="' . $objRow->alias . '"';
        $objRow->ftc_classes = trim('mod_article '.$objRow->cssID[1]);
        return $objRow;  

        }else{
       $akt_preset=unserialize($objRow->ftc_preset_full);       
       $ftc_classes = $this->getGridVars($akt_preset,$objRow->ftc_preset_add_custom,$objRow->ftc_preset_custom);
      //$objRow->data_attr = $this->splitArr($objRow->data_attr_ftc);
        $objRow->ftc_classes = trim('mod_article '.$objRow->cssID[1]).' '.$ftc_classes;
        }
    return $objRow; 
    
  } 
  //outputFrontendTemplate, $strContent, $strTemplate
  // getFrontendModule
  public function modules($objRow, $strBuffer, $objModule){   
        //var_dump($objRow->type);
    switch ($objRow->type) {
        case 'navigation':
        case 'customnav':
        case 'search':
        case 'login':
        case 'lostPassword':
        case 'breadcrumb':
        case 'topbar':
        case 'offcanvas':
        case 'offcanvasjq':
        case 'multitogglejq':
          $key = $objRow->type;
          //get the registrated Classname
          $strClass  = \Module::findClass($objRow->type);

          $objEl = new $strClass($objRow);
          $objEl->cssID = unserialize($objRow->cssID);
          if(!is_array(unserialize($objRow->ftc_preset_full))){ 
          $akt_preset=array();
          $objEl->ftc_classes = trim($objRow->typePrefix.$objRow->type.' '.$objEl->cssID[1]);
          $objEl->ftcID = ($objEl->cssID[0] !== '') ? ' id="' . $objEl->cssID[0] . '"' : '';
          $objEl->data_attr = $this->splitArr($objRow->data_attr_ftc); 
          $strBuffer = $objEl->generate();
          return $strBuffer;    
          }else{
          $akt_preset=unserialize($objRow->ftc_preset_full);      
          }

          $ftc_classes = $this->getGridVars($akt_preset,$objRow->ftc_preset_add_custom,$objRow->ftc_preset_custom);
          $objEl->ftc_classes = trim($objRow->typePrefix.$objRow->type.' '.$objEl->cssID[1]).' '.$ftc_classes;
          $objEl->ftcID = ($objEl->cssID[0] != '') ? ' id="' . $objEl->cssID[0] . '"' : '';
          $objEl->data_attr = $this->splitArr($objRow->data_attr_ftc); 
          $strBuffer = $objEl->generate();
          unset($objEl);
          break;

        default:
          break;
    }
  
    
    return $strBuffer; 
   
  } 
                      
  //prepare vars for contentelements  
  public function design_elements($el){
         
      $el->cssID = (is_array($el->cssID))?$el->cssID : unserialize($el->cssID);

     //FTC Classes 
     if(!is_array(unserialize($el->ftc_preset_full))){ 
       $akt_preset=array();
        $el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]);
        $el->ftcID = ($el->cssID[0] !== '') ? ' id="' . trim($el->cssID[0]) . '"' : '';
        $el->data_attr = $this->splitArr($el->data_attr_ftc);
       return $el;  
      }else{
       $akt_preset=unserialize($el->ftc_preset_full); 
      }

     $ftc_classes = $this->getGridVars($akt_preset,$el->ftc_preset_add_custom,$el->ftc_preset_custom);
//var_dump($el->type,$el->cssID,($el->cssID==''));

     $el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]).' '.$ftc_classes;
     $el->ftcID = ($el->cssID[0] !== '') ? ' id="' . trim($el->cssID[0]) . '"' : '';
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

        default:
      //var_dump($el);
      }
     
     unset($ftc);
     return $el;
  }
     
     
  public function design_modules($el){
               
          $elModel = \ModuleModel::findByID($el->module);
         // var_dump($elModel->type);
       switch($elModel->type) {
          case 'customnav':
          case 'navigation':
          case 'offcanvas':
          case 'search':
          case 'login':
          case 'lostPassword':
            $strClass  = \Module::findClass($elModel->type);   
            $elModul = new $strClass($elModel);
            $el->cssID = unserialize($el->cssID);

            if(!is_array(unserialize($el->ftc_preset_full))){ 
              $akt_preset=array();
                $elModul->ftc_classes = trim('mod_'.$elModel->type.' '.$el->cssID[1]);
                $elModul->ftcID = ($el->cssID[0] != '') ? ' id="' . $el->cssID[0] . '"' : '';
                $elModul->data_attr = $this->splitArr($el->data_attr_ftc);
                $strBuffer = $elModul->generate();
               return $strBuffer;    
            }else{
              $akt_preset=unserialize($el->ftc_preset_full);
            
            $ftc_classes = $this->getGridVars($akt_preset,$el->ftc_preset_add_custom,$el->ftc_preset_custom);
   
            $elModul->ftc_classes = trim('mod_'.$elModel->type.' '.$el->cssID[1]).' '.$ftc_classes;
            $elModul->ftcID = ($el->cssID[0] != '') ? ' id="' . $el->cssID[0] . '"' : '';
            $elModul->data_attr = $this->splitArr($el->data_attr_ftc);

//      $el->Template = new \FrontendTemplate('mod_'.$el->type.'_ftc');
//      $el->Template->setData($el);
//      $el->compile();
            $strBuffer = $elModul->generate();
            }
            return $strBuffer;
            break;
            
          default:
            return $strBuffer;
        }         
  }
          
          
  public function design_fields($el){
     
     $ftc = array();
     
       //FTC Classes 
      if(!is_array(unserialize($el->ftc_preset_full))){ 
      $akt_preset=array();
      //return $objRow;     
      }else{
      $akt_preset=unserialize($el->ftc_preset_full);   

      }
      if(!is_array(unserialize($el->ftc_preset_full_label))){ 
      $akt_preset_label=array();
      // return $objRow;     
      }else{
      $akt_preset_label=unserialize($el->ftc_preset_full_label);   

      }
    
      $ftc_classes = $this->getGridVars($akt_preset,'',NULL);
      $ftc_classes_label = $this->getGridVars($akt_preset_label,'',NULL);

      $ftc['style_label'] = $this->splitArr($el->label_classes);  
      $ftc['data_attr'] = $this->splitArr($el->data_attr_ftc);

      $el->class = $el->class;
      $el->ftc_field_classes = $ftc_classes;
      $el->ftc_fix_classes = $ftc_classes_label;
      $el->label_style = $ftc['style_label'];

      switch($el->type) {

          case 'range_slider':
            $el->rs_id = 'range_value_'.$el->id;
            $el->ftc_rs_classes = $this->splitArr($el->rs_classes);
            break;
          case 'submit':
            $ftc['button_classes'] = $this->splitArr($el->btn_styles).' '.$el->btn_size;
            $el->btn_classes = $ftc['button_classes'];
            break;
          case 'select':
            $arrOptions = unserialize($el->options);
            $el->arrOptions = $this->getOptionsSelect($arrOptions);
            break;
           case 'radio':
            $arrOptions = unserialize($el->options);
            $el->arrOptions = $this->getOptionsRadio($arrOptions, $el->name);
            break;  

          
          default:
      }
     unset($ftc);
     
     return $el;
  }

  public function formfieldtemplates($objWidget, $formId, $arrData, $_this){

      switch($objWidget->type) {

          //formfields
          case 'text':
          case 'email':
          case 'number':
          case 'tel':
          case 'url':
            $objWidget->__set('template','form_textfield_ftc');
            break;
          case 'select':
          case 'upload':
          case 'checkbox':
          case 'explanation':
          case 'fieldset':
          case 'headline':
          case 'password':
          case 'radio':
          case 'submit':
          case 'textarea':   
          case 'captcha':
          case 'message':
     
            $objWidget->__set('template','form_'.$objWidget->type.'_ftc');
            break;
          default:
          
            break;
                     
          }

      return $objWidget;
  }

  public function getOptionsSelect($arr) {
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
  public function getOptionsRadio($arr,$name)
  {
    $arrOptions = array();

    foreach ($arr as $i=>$arrOption)
    {
      $arrOptions[] = array
      (
        'name'       => $name,
        'id'         => $name. '_' . $i,
        'value'      => $arrOption['value'],
        'checked'    => ($arrOption['default'])? 'checked':'',
      //  'attributes' => $this->getAttributes(),
        'label'      => $arrOption['label']
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
     //var_dump($ftc_classes,'teesst',count($ftc));
     $ftc['columns'] = (count($ftc)==0)?'':'columns';
     //FTC Classes 
     $ftc['float_ftc'] = ($preset['float_ftc']!=='-')?$preset['float_ftc']:'';
     
     $ftc['align'] = ($preset['align']!==NULL)?$this->splitArr($preset['align']):'';
     $ftc['custom'] = ($preset['custom']!==NULL)?$preset['custom']:'';
     
    
     $ftc_classes = trim(implode(' ',$ftc));
     unset( $preset);
     return $ftc_classes;
     
 }
  //CSS Set for Layout
  public function getGridArr($objLayout){
    $GridClassesArr = array();
    $GridClassesArr["header"] = ($objLayout->__get("ftc_preset_full_rwh")===NULL)?'':$this->getGridVars($objLayout->__get("ftc_preset_full_rwh"),'',array());
    $GridClassesArr["footer"] = ($objLayout->__get("ftc_preset_full_rwf")===NULL)?'':$this->getGridVars($objLayout->__get("ftc_preset_full_rwf"),'',array());
    $GridClassesArr["main"] = ($objLayout->__get("ftc_preset_full_main")===NULL)?'': $this->getGridVars($objLayout->__get("ftc_preset_full_main"),'',array());
    $GridClassesArr["left"] = ($objLayout->__get("ftc_preset_full_cll")===NULL)?'':$this->getGridVars($objLayout->__get("ftc_preset_full_cll"),'',array());
    $GridClassesArr["right"] = ($objLayout->__get("ftc_preset_full_clr")===NULL)?'':$this->getGridVars($objLayout->__get("ftc_preset_full_clr"),'',array());

    return $GridClassesArr;
  }
    // Add jQuery Library + Modernizr scripts for Layout
  public function getLibStr($objLayout){
    $ScriptStr = '';
    $VendorArr =unserialize($objLayout->__get("FTC_JS"));
    $objCombiner = new \Combiner();
    $pathFTC = 'system/modules/foundation-to-contao/assets/';
      if (is_array($VendorArr)&&!empty($VendorArr)){
          foreach ($VendorArr as $k => $script) {
            
            if ($script!=='mediaelement_player') {
             $objCombiner->add($pathFTC.'foundation/js/vendor/'.$script.".js");
            }
          }
      }

   
        if ((floatval(VERSION)>=3.3)) {
          $ScriptStr .= "\n" . \Template::generateScriptTag($objCombiner->getCombinedFile(), $blnXhtml); //>=3.3.0
        }else{
           $ScriptStr .= "\n" . '<script src="'.$objCombiner->getCombinedFile().'"></script>';
        }
    return $ScriptStr;
  }  
  // Add Foundation scripts for Layout
  public function getScriptStr($objLayout){
    $ScriptStr = '';
    $arrPlugs = array();
    $VendorArr =unserialize($objLayout->__get("FTC_JS"));
    $objCombiner = new \Combiner();
    $pathFTC = 'system/modules/foundation-to-contao/assets/';
      if (is_array($VendorArr)&&!empty($VendorArr)){
          foreach ($VendorArr as $k => $script) {
            $arrPlugs[$script] =true;
          }
      }
    $PluginArr =unserialize($objLayout->__get("FoundationJS"));

      if (is_array($PluginArr)&&!empty($PluginArr)){
          
          $objCombiner->add($pathFTC.'foundation/js/foundation/foundation.js');
          foreach ($PluginArr as $plugin){
            $objCombiner->add($pathFTC.'foundation/js/foundation/foundation.'.$plugin.'.js');
            $arrPlugs[$plugin] =true;
          }
        if ((floatval(VERSION)>=3.3)) {
          $ScriptStr .= "\n" . \Template::generateScriptTag($objCombiner->getCombinedFile(), $blnXhtml); //>=3.3.0
        }else{
           $ScriptStr .= "\n" . '<script src="'.$objCombiner->getCombinedFile().'"></script>';
        }
         
          $ScriptStr .= "\n" . '<script>
        $(document).ready(function(){' ;
            if ($arrPlugs['tooltip']) {
              $ScriptStr .= "\n" . "$('.ce_text [title]').each(function(index){
            _this = $(this);
              _this.attr('data-tooltip','tooltip'+index).addClass('tip-bottom');
              });";
            }
              $ScriptStr .= "\n" .  "$(document).foundation();";
            if ($arrPlugs['orbit']) { 
              $ScriptStr .= "\n" .  "$(document).foundation({  
               orbit: {
          slide_number_text: '/'}
            });";     
            }       
           if ($arrPlugs['tooltip']) { 
              $ScriptStr .= "\n" .  "$(document).foundation({
                    tooltips: {
                    selector : '.has-tip-custom,.button,a'
                  }
                });";
                  
           } 
           if ($arrPlugs['joyride']) { 
              $ScriptStr .= "\n" .  "$(document).foundation('joyride', 'start');";
                    
            }        
          
              $ScriptStr .= "\n" . "var doc = document.documentElement;
           doc.setAttribute('data-useragent', navigator.userAgent);";
              $ScriptStr .= "\n" . "});
          </script>";
                
           if ($arrPlugs['mediaelement_player']) {
              $ScriptStr .= "\n" . '<script src="'.$pathFTC.'/mediaelement/mediaelement-and-player.min.js"></script>'."\n";
              $ScriptStr .= "\n" .  "<script>
            $('video,audio').mediaelementplayer(/* Options */);
            </script>";
           }     
        }


    return $ScriptStr;
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
?>