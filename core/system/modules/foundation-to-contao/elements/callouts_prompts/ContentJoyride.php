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

class ContentJoyride extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_joyride';


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
		
		global $objPage;

		$items = unserialize($this->joyride);
		

		$this->Template->id = 'joyride_' . $this->id;
		//

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
