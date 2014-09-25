<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
* @package   Foundation To Contao
* @author    Monique Hahnefeld
* @license   LGPL
* @copyright 2014 Monique Hahnefeld
 */
 
 $fieldsSize=count($GLOBALS['TL_DCA']['tl_layout']['fields'])-1;
 
  
 $GLOBALS['TL_DCA']['tl_form']['fields']['tableless']['sql']=  "char(1) NOT NULL default '1'";

 
 
 
 
 ?>