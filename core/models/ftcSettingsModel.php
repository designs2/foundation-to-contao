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

class ftcSettingsModel extends \Model
{

    protected static $strTable = 'tl_ftc_settings';
    
    //get grid value and generate options
    public function getSmallOpitons()
     {
     
     
     $GridSize=$this->getMaxCols();
     $optionsArr=array();
     $optionsArr[0]='';
    	  //ftc setting size of columns (default=12) 
    	  for ($i = 1; $i <= $GridSize; $i++) {
    	  	$optionsArr[$i]='small-'.($i);
    	  }
     
     return $optionsArr;
     	
     }
     public function getLargeOpitons()
     {
     $GridSize=$this->getMaxCols();
     $optionsArr=array();
     $optionsArr[0]='';
    	  //ftc setting size of columns (default=12) 
    	  for ($i = 1; $i <= $GridSize; $i++) {
    	  	$optionsArr[$i]='large-'.($i);
    	  }
     
     return $optionsArr;
     	
     }
    public function getMaxCols() {
    
    $objModel = ftcSettingsModel::findAll()->fetchAll();
     $Settings =$objModel;
   
     $ColsArr =array();
     foreach ($Settings as $k => $set) {
     	$ColsArr[]=$set['cols'];
     }
     //var_dump($ColsArr);
     $ColsMax= max($ColsArr);
    
    	return $ColsMax;
    }
    
    
    
    
    
    
    

}



?>