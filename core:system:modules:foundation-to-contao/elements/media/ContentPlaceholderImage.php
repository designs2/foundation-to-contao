<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace MHAHNEFELD\FTC;



/**
 * Class ContentImage
 *
 * Front end content element "image".
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class ContentPlaceholderImage extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_placeholder_image';


	/**
	 * Return if the image does not exist
	 * @return string
	 */
	public function generate()
	{
		$sizeStr = unserialize($this->size);
		$imagemargin = unserialize($this->imagemargin);
		$this->arrSize = $sizeStr;
		$this->href = ($this->imageUrl!=='') ? $this->imageUrl: false;
		$this->margin = 'margin:'.$imagemargin['top'].$imagemargin['unit'].' '.$imagemargin['right'].$imagemargin['unit'].' '.$imagemargin['bottom'].$imagemargin['unit'].' '.$imagemargin['left'].$imagemargin['unit'].'; ';
		
		$is_bw = ($this->is_bw) ? 'g/' : '' ;
		$this->singleSRC ='http://lorempixel.com/'.$is_bw.''.$sizeStr[0].'/'.$sizeStr[1].'/'.$this->topic.'/'.$this->stamp.'/'; //$objFile->path;
		return parent::generate();
	}


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		//$this->addImageToTemplate($this->Template, $this->arrData);
	}
}
