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

//use ftcPresetsModel;

class GridWizard extends \Widget
{

	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget';
	
	
	public $fieldsArr = 'small,medium,large,xlarge,xxlarge,float_ftc,align,pull,push';


	//$varValue = array
	public function getFields($dc_id,$varValue) {
		$this->loadDataContainer('tl_ftc_presets');
		$this->loadLanguageFile('tl_ftc_presets'); 
		//Mediaquery settings
			
		$fieldDCA = $GLOBALS['TL_DCA']['tl_ftc_presets']['fields'];
		$fields = array();

		if($varValue===Null||$varValue==''){
			$PostFieldsArr = $this->getPostArr();	
		}else{
			$PostFieldsArr = $varValue;
		}
		
		$fieldsStr = '';
		
		foreach(explode(',',$this->fieldsArr) as $field)
		{
			$arrData = $fieldDCA[$field];
			$strClass =$GLOBALS['BE_FFL'][$arrData['inputType']];

			$objWidget = new $strClass($strClass::getAttributesFromDca($arrData, $field,$arrData['default'], '', '', $this));
			
				
		
		$objWidget->value = $PostFieldsArr[$field];

		$objWidget->label = ($objWidget->label=='')?$objWidget->name:$objWidget->label;
		$fields[$field]['label'] = $objWidget->generateLabel();
		$fields[$field]['field'] = $objWidget->generateWithError(true);
		
		$fieldsStr .= "\n".'<div class="'.$arrData['eval']['tl_class'].'">'."\n\t".'<h3>'.$fields[$field]['label'].'</h3>'."\n\t".$fields[$field]['field']."\n".'</div>';

		}

		$submit = ($_GET['table']===NULL)?'tl_'.$_GET['do']:$_GET['table'];

		if (\Input::post('FORM_SUBMIT') == $submit){
				$this->setCustomPreset($dc_id,serialize($PostFieldsArr));
		}	
		return $fieldsStr;
	}
	
	public function setCustomPreset($dc_id,$PostFieldsArr) {
		$ftcPM = new ftcPresetsModel;
		$strClass = $ftcPM->getStrClass();
		
		$DoModel = $strClass::findByID($dc_id);

		if ($DoModel->ftc_preset_add_custom=='1') {
			$arrPreset = $PostFieldsArr;
			$DoModel->ftc_preset_custom = $arrPreset;
			$DoModel->save(true);	

		}

	}

	public function getPostArr() {
	
		$PostFieldsArr = array();
		
		foreach(explode(',',$this->fieldsArr) as $field)
				{
					//var_dump(\Input::post($field));
					$PostFieldsArr[$field] = (\Input::post($field)===NULL)?'-':\Input::post($field);
				}
				
		return $PostFieldsArr;
	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate(){
	
		$dc_id = $this->currentRecord;
		return $this->getFields($dc_id,$this->varValue);
				
	}


	
}
