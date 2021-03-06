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
//use MHAHNEFELD\FTC\ModuleExt;
class ModuleOffcanvas extends \ModuleExt
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_navigation_offcanvas';
	
	/**
		 * Compile the current element
		 */
		//abstract protected function compile();
	
	

	/**
	 * Do not display the module if there are no menu items
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['navigation'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$strBuffer = parent::generate();
		return $strBuffer;//($this->Template->items != '') ? $strBuffer : '';
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		global $objPage;

		// Set the trail and level
		if ($this->defineRoot && $this->rootPage > 0)
		{
			$trail = array($this->rootPage);
			$level = 0;
		}
		else
		{
			$trail = $objPage->trail;
			$level = ($this->levelOffset > 0) ? $this->levelOffset : 0;
		}

		$lang = null;
		$host = null;

		// Overwrite the domain and language if the reference page belongs to a differnt root page (see #3765)
		if ($this->defineRoot && $this->rootPage > 0)
		{
			$objRootPage = \PageModel::findWithDetails($this->rootPage);

			// Set the language
			if (\Config::get('addLanguageToUrl') && $objRootPage->rootLanguage != $objPage->rootLanguage)
			{
				$lang = $objRootPage->rootLanguage;
			}

			// Set the domain
			if ($objRootPage->rootId != $objPage->rootId && $objRootPage->domain != '' && $objRootPage->domain != $objPage->domain)
			{
				$host = $objRootPage->domain;
			}
		}

		$this->Template->request = ampersand(\Environment::get('indexFreeRequest'));
		$this->Template->skipId = 'skipNavigation' . $this->id;
		$this->Template->skipNavigation = specialchars($GLOBALS['TL_LANG']['MSC']['skipNavigation']);
		
//		$nnn = new ModuleExt($this, $strColumn='main');
//		$mmm= new ModuleOffcanvas;
		$this->Template->items = $this->renderNavigationFTC($trail[$level], 1, $host, $lang);
		
	//	$prepVars = new PrepareVars;
	//	$ftc_classes = $prepVars->getGridVars(unserialize($this->aktiv_preset_ftc)[0],$this->add_custom_settings,$this->custom_preset_ftc);
			
		$this->Template->cssID = $this->cssID;
//		var_dump($this->Template->cssID);
		$this->Template->ftc_classes = trim($this->typePrefix.$this->type.' '.$this->Template->cssID[1]).' '.$ftc_classes;
		$this->Template->ftcID = ($this->Template->cssID[0] != '') ? ' id="' . $this->Template->cssID[0] . '"' : '';
		
		
		
	}
}
