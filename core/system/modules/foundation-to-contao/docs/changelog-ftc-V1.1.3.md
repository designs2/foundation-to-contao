## FTC – Foundation To Contao  
# Maindeveloper Monique Hahnefeld <info@monique-hahnefeld.de>

Requirements
PHP:">=5.3.2",
Contao: 3.4.0 - 3.4.x
Multicolumnwizard: >=3.2

##Changelog 1.1.3

###New
- support of adaptive images

	-> change templates:  
	
		#media
		- ce_image_ftc f
		- ? video poster for later 
		#content
		- ce_text_ftc f
		#links
		- ce_hyperlink_image_ftc f
		#modules
		- ++mod_random_image_ftc ,finish for grid classes later
		#orbit
		- orbit_list f
		- picture_orbit f
		- (++thumbnail_nav) feature for later
		- ??caption aus metadata
		#clearing
		- clearing_list f
		- ++picture_clearing f
		- rename pagination_ftc to pagination to overwrite core pagination-template at all
		
	-> change classes:  
	
		#content
		- ContentOrbit f
		- (extController->PaginationFTC check if nessesary)
		- ContentClearing f 
		- (ContentClearing add caption for popup open later) 

###Improved

###Fixed
- css grid width for dlh_googlemaps
- fix using lightbox for image in ce_text_ftc 
