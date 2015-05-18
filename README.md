silverstripe-text
=======================================

Introduction
---------------------------------------
SilverStripe module which provides `Font` and `FontSize` DataObjects and a `Settings->Appearance->Text` Menu for managing your website's Fonts and FontSizes.

Maintainer Contact
---------------------------------------
-   Stephen Corwin - <stephenjcorwin@gmail.com>
   
Requirements
---------------------------------------
-   SilverStripe 3.1
-   [stephenjcorwin/silverstripe-style-sheet](https://github.com/stephenjcorwin/silverstripe-style-sheet)

Features
---------------------------------------
-   Create and maintain sitewide Fonts and FontSizes
-   Generate and reference database driven CSS classes

Installation
---------------------------------------
Installation can be done either by composer or by manually downloading a release.

####Via Composer:
`composer require stephenjcorwin/silverstripe-text`

####Manually:
1.   Download the module from [the releases page](https://github.com/stephenjcorwin/silverstripe-text/releases)
2.   Extract the file
3.   Make sure the folder after being extracted is name 'silverstripe-text'
4.   Place this directory in your site's root directory

####Configuration:
-   After installation, make sure you rebuild your database through `dev/build`
-	You should see the a new Menu in the CMS for managing `Fonts` and `FontSizes` available through the `Settings->Appearance->Text` Menu

Uninstall
---------------------------------------
####Via Composer:
`composer remove stephenjcorwin/silverstripe-text`

####Manually:
1.   Remove the `silverstripe-text` directory in your site's root directory

####Configuration:
-   After uninstalling, make sure you rebuild your database through `dev/build`

Code Examples
---------------------------------------
####Defining a `has_one` relationship with `Font` and `FontSize`:

####`mysite/code/MyDataObject.php`
    <?php
    class MyDataObject extends DataObject {
        private static $has_one = array (
            'MyFont' => 'Font',
            'MyFontSize' => 'FontSize'
        );
    
        public function getCMSFields() {
            $fields = parent::getCMSFields();
    
            /*
            *   MAIN TAB
            */
    
            $tab = 'Root.Main';
            
            //provides listbox field menu for selecting a predefined font
            $data = DataObject::get('Font');
            $field = new ListboxField('MyFontID', 'My Font');
    	    $field->setSource($data->map('ID', 'Name')->toArray());
    	    $field->setEmptyString('Select one');
    	    $fields->addFieldToTab($tab, $field);
            
            //provides listbox field for selecting a predefined font size
    	    $data = DataObject::get('FontSize');
    	    $field = new ListboxField('MyFontSizeID', 'My Font Size');
    	    $field->setSource($data->map('ID', 'Name')->toArray());
    	    $field->setEmptyString('Select one');
    	    $fields->addFieldToTab($tab, $field);
    
            return $fields;
    	}
    }

####Using database generated classes for styling:

####`mysite/code/Page.php`
    <?php
    class Page extends SiteTree {
    	private static $has_one = array(
    		'MyFont' => 'Font',
            'MyFontSize' => 'FontSize'
		);

		public function getCMSFields() {
            $fields = parent::getCMSFields();
    
            /*
            *   MAIN TAB
            */
    
            $tab = 'Root.Main';
            
            //provides listbox field menu for selecting a predefined font
    	    $data = DataObject::get('Font');
    	    $field = new ListboxField('MyFontID', 'My Font');
    	    $field->setSource($data->map('ID', 'Name')->toArray());
    	    $field->setEmptyString('Select one');
    	    $fields->addFieldToTab($tab, $field);
            
            //provides listbox field for selecting a predefined font size
    	    $data = DataObject::get('FontSize');
    	    $field = new ListboxField('MyFontSizeID', 'My Font Size');
    	    $field->setSource($data->map('ID', 'Name')->toArray());
    	    $field->setEmptyString('Select one');
    	    $fields->addFieldToTab($tab, $field);
    
            return $fields;
    	}
    }

    class Page_Controller extends ContentController {
    	public function init() {
			parent::init();
		}
    }

####`themes/mytheme/templates/Page.ss`
    <!DOCTYPE html>
	<html>
		<body
			class="
				<% if $MyFont %>$MyFont.CSSClass<% end_if %>
				<% if $MyFontSize %>$MyFontSize.CSSClass<% end_if %>
			"
		>
			$Layout
		</body>
	</html>