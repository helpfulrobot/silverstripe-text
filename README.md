silverstripe-text
=======================================

Description
---------------------------------------
SilverStripe module which provides [Font] and [FontSize] DataObjects and a Settings->Appearance->Text menu for managing your website's Fonts and FontSizes.

Usage
---------------------------------------
```
<?php
class MyDataObject extends DataObject {
    static $has_one = array (
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
```

Install
---------------------------------------
####Command Line:
```
composer require stephenjcorwin/silverstripe-text
```

####Address Bar:
```
localhost/dev/build
```

Uninstall
---------------------------------------
####Command Line:
```
composer remove stephenjcorwin/silverstripe-text
```

####Address Bar:
```
localhost/dev/build
```