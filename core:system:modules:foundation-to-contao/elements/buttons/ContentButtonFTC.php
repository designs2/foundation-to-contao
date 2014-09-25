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

class ContentButtonFTC extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_button_ftc';


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
	
			if (TL_MODE == 'BE')
			{
				$this->strTemplate = 'be_wildcard';
				$this->Template = new \BackendTemplate($this->strTemplate);
				$this->Template->title = $this->headline;
			}
			$this->Template->id = 'btn_' . $this->id;
			if ($this->use_reveal) {
			$this->Template->btn_attr = 'data-reveal-id="' . $this->modal_id . '"';	
			}
			$this->Template->btn_classes = $this->btn_size. '' . $this->splitArr($this->btn_styles);
	
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
