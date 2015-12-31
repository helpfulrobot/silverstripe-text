<?php
class Font extends StyleObject
{
    /**
   * FIELDS
   */

  private static $db = array(
    'Name' => 'Text',
    'Value' => 'Text'
  );

    private static $default_records = array(
    /*array (
      'Key' => 'Value',
      'Key' => 'Value',
    ),
    array (
      'Key' => 'Value',
      'Key' => 'Value',
    ),
    array (
      'Key' => 'Value',
      'Key' => 'Value',
    ),*/
  );

  /**
   * CONFIGURATION
   */

  private static $default_sort='Name ASC';

    private static $summary_fields = array(
    'Name' => 'Name',
    'Value' => 'Value',
    'CMSPreview' => 'Preview'
  );

  /**
   * CMS FIELDS
   */

  public function getCMSFields()
  {
      $fields = parent::getCMSFields();
    
    /**
     * MAIN TAB
     */

    $tab = 'Root.Main';

      $field = new TextField('Name');
      $fields->addFieldToTab($tab, $field);

      $field = new TextField('Value');
      $fields->addFieldToTab($tab, $field);

      $html = ViewableData::renderWith('Font_CMS_Preview');
      $field = new LiteralField('Preview', $html);
      $fields->addFieldToTab($tab, $field);
    
      return $fields;
  }

    public function getCMSPreview()
    {
        $html = ViewableData::renderWith('Font_CMS_Preview');
        $obj = HTMLText::create();
        $obj->setValue($html);
        return $obj;
    }
}
