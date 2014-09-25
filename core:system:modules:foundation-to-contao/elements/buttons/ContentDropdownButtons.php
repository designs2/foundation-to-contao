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

class ContentDropdownButtons extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_dropdown_buttons';


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		global $objPage;

		$items = unserialize($this->list_links);
		$nl2br = ($objPage->outputFormat == 'xhtml') ? 'nl2br_xhtml' : 'nl2br_html5';

		$this->Template->id = 'dropdown' . $this->id;
		if ($this->btn_hover) {
			$hover='is_hover:true;';
		}else {
			$hover='';
		}
		//down is default
		if ($this->drop_align!=='down'&&$this->drop_align!==' '&&$this->drop_align!=='') {
			$drop_align='align:'.$this->drop_align;
		}else {
			$drop_align='';
		}
		$this->Template->dropdown_opt = $hover. '' .$drop_align;
		$this->Template->btn_classes = $this->btn_size. '' . $this->splitArr($this->btn_styles);
	
		$this->Template->items = $items;
		
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
