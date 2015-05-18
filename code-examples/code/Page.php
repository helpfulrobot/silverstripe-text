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