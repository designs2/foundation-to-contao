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


	public function getFields() {
		$this->loadDataContainer('tl_ftc_presets');
		$this->loadLanguageFile('tl_ftc_presets'); 
		//Mediaquery settings
			
		$fieldDCA = $GLOBALS['TL_DCA']['tl_ftc_presets']['fields'];
		$fields = array();

		$Settings = $this->setVals();
		//var_dump($Settings);
		$fieldsStr = '';
		
		foreach(explode(',',$this->fieldsArr) as $field)
		{
			$arrData = $fieldDCA[$field];
			$strClass =$GLOBALS['BE_FFL'][$arrData['inputType']];

			$objWidget = new $strClass($strClass::getAttributesFromDca($arrData, $field,$arrData['default'], '', '', $this));
			
				
		
		$objWidget->value = $Settings[$field];

		$objWidget->label = ($objWidget->label=='')?$objWidget->name:$objWidget->label;
		$fields[$field]['label'] = $objWidget->generateLabel();
		$fields[$field]['field'] = $objWidget->generateWithError(true);
		
		$fieldsStr .= "\n".'<div class="'.$arrData['eval']['tl_class'].'">'."\n\t".'<h3>'.$fields[$field]['label'].'</h3>'."\n\t".$fields[$field]['field']."\n".'</div>';

		}

		$submit = ($_GET['table']===NULL)?'tl_'.$_GET['do']:$_GET['table'];//'tl_'.$_GET['do']

		if (\Input::post('FORM_SUBMIT') == $submit){
		
				$this->saveFields();
		}	
		return $fieldsStr;
	}
	
	public function setVals() {
		$ftcPM = new ftcPresetsModel;
		$strClass = $ftcPM->getStrClass();
		
		$DoModel = $strClass::findByID(\Input::get('id'));
		
		$arrPreset = $DoModel->ftc_preset_full;
		if ($DoModel->ftc_preset_add_custom=='1') {
			$arrPreset = $DoModel->ftc_preset_custom;

		}
		return unserialize($arrPreset);
	}

	public function saveFields() {
	
		$arrSettings = array();
		foreach(explode(',',$this->fieldsArr) as $field)
				{
					$arrSettings[$field] = (\Input::post($field)===NULL)?'-':\Input::post($field);
				}
				
		$ftcPM = new ftcPresetsModel;
		$ftcPM->setPresets($arrSettings,true);

	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		return $this->getFields();
		
					
	}


	
}
