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

class ContentButtonBarStartFTC extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_button_bar_start_ftc';


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

		if ($this->cssID!=='') {
		$cssIDArr= $this->cssID;	
		}else{
		$cssIDArr= array('','');
		}	
		
		$this->Template->headline = $this->headline;
		$this->Template->cssID = $cssIDArr[0];
		$this->Template->class = $cssIDArr[1];
		unset($this);
	}
}
