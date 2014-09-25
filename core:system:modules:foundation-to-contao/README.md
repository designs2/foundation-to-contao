#FTC

##Requirements

- Contao 3.3.
- MulticolumWizard
- Foundation 5 von Zurb
- jQuery


##Documentation

	http://www.foundation-to-contao.de
	
	
##Introduction	
	http://www.new.foundation-to-contao.de
	
##Tutorials	

	https://designs2.de
	
##Download on Github

	https://github.com/MoniqueHahnefeld/foundation-to-contao

	
##Infos

Zusätzliche Informationen zu den Funktionen:


### Working with Rem (german)
http://www.drweb.de/magazin/css-gerootet-flexible-schriftgroessen-mit-rem-38784/

### PLaceholder Images

[Loremppixel](http://lorempixel.com/800/800/cats/designs2/)
[Placehold.it](http://placehold.it/)

### Compatiblity
http://foundation.zurb.com/docs/compatibility.html

### view for icons+names

An Icon Font for intgegration in foundation

http://zurb.com/playground/foundation-icon-fonts-3


### designs patterns foundation
http://patterntap.com/code
http://patterntap.com/

### stencil sets 
http://zurb.com/playground/foundation4-stencil-sets

### Mansonry Plugin 
http://patterntap.com/code/stacking-columns-layout-masonry

### settings fpr contao
Artikel f
Nachrichten
Events
FAQ
Newsletter
Formulargenerator f
Kommentare

TinyMCE anpassen
Font-Icon Picker
Keystrokes
Labels


### integrated functions of Foundation Framework


All Foundation Components
FORMS:

	Forms f
	Range Slider f 
 
GRID:

	Grid f
	Block Grid f

BUTTONS:

	Buttons f
	Button Groups f
	Dropdown Buttons f
	Split Buttons f

 
TYPOGRAPHY:

	Type f
	Inline Lists w
	List f

OTHER CSS COMPONENTS:

	Panels f
	Progress Bars f
	Tables w
	Pricing Tables f
	Thumbs f
	Flex Video f
 
JAVASCRIPT COMPONENTS:

 
	Dropdown f
	Accordion f
	Tabs	f
	Equalizer f
	Clearing f
	Pagination f
	Orbit f
	
	Alert Boxes f
	Joyride f
	Reveal f
 
#### Meta
 
	Abide
	Tooltips f 
	Interchange
	Visibility

#### Module 

	JS Top Bar f
	Magellan f
	Off Canvas f
  
 NAVIGATION:
  
	Side Nav 
	Breadcrumbs f
	Sub Nav
 
 
### Settings
 
	settings mit scss generate f
 
### use Tooltips
 
#### Setting tooltip
```javascript
    $('[title]').attr('data-tooltip','data-tooltip');
	$(document).foundation({
  				tooltips: {
    selector : '[title]',
    additional_inheritable_classes : [],
    tooltip_class : '.tooltip',
    touch_close_text: 'tap to close',
    disable_for_touch: false,
    tip_template : function (selector, content) {
      return '<span data-selector="' + selector + '" class="'
        + Foundation.libs.tooltips.settings.tooltipClass.substring(1)
        + '">' + content + '<span class="nub"></span></span>';
   		 }}
  		});
```
### ORBIT
```javascript
 $(document).foundation({
   orbit: {
       animation: 'slide', // Sets the type of animation used for transitioning between slides, can also be 'fade'
       timer_speed: 10000, // Sets the amount of time in milliseconds before transitioning a slide
       pause_on_hover: true, // Pauses on the current slide while hovering
       resume_on_mouseout: false, // If pause on hover is set to true, this setting resumes playback after mousing out of slide
       next_on_click: true, // Advance to next slide on click
       animation_speed: 500, // Sets the amount of time in milliseconds the transition between slides will last
       stack_on_small: false,
       navigation_arrows: true,
       slide_number: true,
       slide_number_text: 'of',
       container_class: 'orbit-container',
       stack_on_small_class: 'orbit-stack-on-small',
       next_class: 'orbit-next', // Class name given to the next button
       prev_class: 'orbit-prev', // Class name given to the previous button
       timer_container_class: 'orbit-timer', // Class name given to the timer
       timer_paused_class: 'paused', // Class name given to the paused button
       timer_progress_class: 'orbit-progress', // Class name given to the progress bar
       timer_show_progress_bar: true, // If the progress bar should get shown (false skips computation)
       slides_container_class: 'orbit-slides-container', // Class name given to the
       bullets_container_class: 'orbit-bullets',
       slide_selector: 'li', // Default is '*' which selects all children under the container
       bullets_active_class: 'active', // Class name given to the active bullet
       slide_number_class: 'orbit-slide-number', // Class name given to the slide number
       caption_class: 'orbit-caption', // Class name given to the caption
       active_slide_class: 'active', // Class name given to the active slide
       orbit_transition_class: 'orbit-transitioning',
       bullets: true, // Does the slider have bullets visible?
       circular: true, // Does the slider should go to the first slide after showing the last?
       timer: true, // Does the slider have a timer active? Setting to false disables the timer.
       variable_height: false, // Does the slider have variable height content?
       swipe: true,
       before_slide_change: noop, // Execute a function before the slide changes
       after_slide_change: noop // Execute a function after the slide changes
   }
 });
```
```html
 settings an template senden
 <ul data-orbit
     data-options="animation:slide;
                   pause_on_hover:true;
                   animation_speed:500;
                   navigation_arrows:true;
                   bullets:false;">
 </ul>
 ```
#### erweitern um thumbsnav

```javascript
 <a data-orbit-link="headline-1" class="small button">
   Goto Slide 1
 </a>
 <a data-orbit-link="headline-2" class="small button">
   Goto Slide 2
 </a>
 <a data-orbit-link="headline-3" class="small button">
   Goto Slide 3
 </a>
```
#### License

This work is published under LGPLv3-License

Further information can be found here: 
[http://www.gnu.de/documents/lgpl.de.html](http://www.gnu.de/documents/lgpl.de.html)