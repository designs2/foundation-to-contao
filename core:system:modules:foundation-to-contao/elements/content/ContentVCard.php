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

class ContentVCard extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_vcard';


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

		$items = unserialize($this->vcard);
		if (!is_array($items)) {
			return;
		}
		$nl2br = ($objPage->outputFormat == 'xhtml') ? 'nl2br_xhtml' : 'nl2br_html5';

		$this->Template->id = 'vcard_' . $this->id;
	
		foreach ($items as  $val) {
			if ($val['class']=='email') {
				$this->Template->email = $this->converte($val['content']);
			}
		}
		 
		$this->Template->items = $items;
	
	}
	public function converte($email) {
	    $p = str_split(trim($email));
	    $new_mail = '';
	    foreach ($p as $val) {
	        $new_mail .= '&#'.ord($val).';';
	    }
	    return $new_mail;
	}
}
