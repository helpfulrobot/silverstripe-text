<?php
class FontSize extends StyleObject {
  /**
   * FIELDS
   */

  private static $db = array (
    'Name' => 'Text',
    'Value' => 'Text'
  );

  private static $defaults = array (
  );

  private static $default_records = array (
    array (
      'Name' => 'Small',
      'Value' => '20px',
    ),
    array (
      'Name' => 'Medium',
      'Value' => '36px',
    ),
    array (
      'Name' => 'Large',
      'Value' => '84px',
    ),
    array (
      'Name' => 'Extra Large',
      'Value' => '100px',
    ),
  );

  /**
   * CONFIGURATION
   */

  private static $default_sort='Value ASC';

  private static $summary_fields = array (
    'Name' => 'Name',
    'Value' => 'Value',
    'CMSPreview' => 'Preview'
  );

  /**
   * CMS FIELDS
   */

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    
    /**
     * MAIN TAB
     */

    $tab = 'Root.Main';

    $field = new TextField('Name');
    $fields->addFieldToTab($tab, $field);

    $field = new TextField('Value');
    $fields->addFieldToTab($tab, $field);

    $html = ViewableData::renderWith('FontSize_CMS_Preview');
    $field = new LiteralField('Preview', $html);
    $fields->addFieldToTab($tab, $field);
    
    return $fields;
  }

  public function getCMSPreview() {
    $html = ViewableData::renderWith('FontSize_CMS_Preview');
    $obj = HTMLText::create();
    $obj->setValue($html);
    return $obj;
  }
}