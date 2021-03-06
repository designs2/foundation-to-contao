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

class ContentAccStartInsideFTC extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_acc_start_inside';


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
		$this->Template->hl = $this->hl;
		$this->Template->headline = $this->headline;
		//var_dump($this->arrData['cssID']);
		$css = $this->arrData['cssID'];
		$css = (is_array($css))?$css:unserialize($css);
		
		$this->Template->ftcID = $css[0];
		unset($css);
	}
}
