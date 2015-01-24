## FTC – Foundation To Contao  
# Maindeveloper Monique Hahnefeld <info@monique-hahnefeld.de>

Requirements
PHP:">=5.3.2",
Contao: 3.3.0 - 3.3.x
Multicolumnwizard: >=3.2

##Changelog 1.1.2

###New

###Improved

###Fixed
- language fix ftc_preset_id_label

##Changelog 1.1.1


###New
- add support for lost password modul (#6)

###Improved

- add css-class field to fieldset-start formfields (because there is only one preset), remove not needed fields from pallete
(Callbacks.php, dca/tl_form_fields.php)
-remove not needed fields from html-  and fielset-stop-element in form-generator
- demo ftc form fix responsive style
- call Hooks only in FE config.php


###Fixed

- fix html field in formular generator (#10)
- fix problem with update preset function (#3)



##Changelog 1.1.0-RC2

changelog ftc

#autoload.php

##Remove Classes
-ContentElements.php

----
Remove ContentElements.php, # add Hook for ContentElements
Remove ContentTeaser.php
Remove ContentArticle.php
Remove ContentAlias.php


----

#Change ContentElements Templates 

class="<?php echo $this->ftc_classes; ?> block"<?php echo $this->ftcID; ?>
->exkl. backend/*, buttons/*, frontend/*

#put wars to the PrepareVars

ContentRevealModalStart.php, 
ContentAlertBox.php, 
ContentProgressBar.php,
ContentAccStartInsideFTC.php,
ContentMagellanStop.php,
ContentMagellanNav.php,
ContentRowStart.php,
ContentTabStartFTC.php,
ContentTabStartInsideFTC.php


 ---

#add indexer:: in templates/modules/*

----

##change palettes
'alert_box' + 'tab_start'# add grid settings

FORMS HOOKS

$GLOBALS['TL_HOOKS']['compileFormFields']($arrFields, $formId, $this)
$GLOBALS['TL_HOOKS']['loadFormField']($objWidget, $formId, $this->arrData, $this)
$GLOBALS['TL_HOOKS']['validateFormField']

Module + Artikel HOOKS
$GLOBALS['TL_HOOKS']['getArticle']($objArticle, $strBuffer)
findFrontendModule($strName)
Model::findClass();

HOOKS
https://github.com/contao/core/search?q=HOOK&ref=cmdform
$GLOBALS['TL_HOOKS']['generateBreadcrumb‘]($arrItems, \Module $objModule)

S['TL_HOOKS']['parseFrontendTemplate']($strContent, $strTemplate)
$GLOBALS['TL_HOOKS']['outputFrontendTemplate']($strContent, $strTemplate)

// config.php
$GLOBALS['TL_HOOKS']['parseBackendTemplate']($strContent, $strTemplate)
 if ($strTemplate == 'be_main')
    {
        // Ausgabe modifizieren
    }


/ config.php
$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('MyClass', 'mygetPageLayout');
 
// MyClass.php
public function mygetPageLayout(\PageModel $objPage, \LayoutModel $objLayout, \PageRegular $objPageRegular)

https://github.com/contao/core/commit/fda11832100659440d979eff992e568a13cac842
getFrontendModule



-------

#add Hook for Formfields
#Remove FormFieldClasses
+ some ContentElementClasses which are no longer needed
#Remove some templates which are not necessary
#modify config and autoload




##Changelog 1.1.0-RC1


----------------------

#remove
Hybrid.php
extndController.php
ModuleFTC.php
PaginationFTC.php




$date =\Date::parse($GLOBALS['objPage']->dateFormat, $this->startDate);


----------
#add parseTemplate Hook
#remmove Files
	ContentText.php
	ContentHeadline.php
	ContentList.php

#add help wizard descriptions


Palettes
+ experteneinstellungen schützen...
Accordion Stop  -css
Accordion Element Start
Accordion Element Stop -css
Tab Stop -css
Tab Start
Tab Stop -css
New Row
Row End -css
Button Bar Stop -css
Dropdown Content Stop -css

---
#fix typing an add langvars
Settings for the Grid with 12 Columns ->de

Tab Start + Nav
nav_legend
tabs_nav,tabs_align,
-> value, label +erklärung

Reihe Beginn
row_data_attr_ftc

Magellan Navigation
magellan_legend
magellan_nav
alias,	content,	class,	


Blockquote
blockquote_legend
vcard_legend


---
Button
use_Reveal -> erklärung


-----
EINSTELLUNGEN lang

MODULE lang
helpwizard

Extendet Topbar Section
Locate -> de

Topbar Section
dropdown_level


---
Flex Video
Fehler mit Paletten
MOD.comments.0



event_list_box_icon_de.html5



