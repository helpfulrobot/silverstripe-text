<?php
class Text_SiteConfigExtension extends DataExtension {
  /**
    CMS FIELDS
  **/

  public function updateCMSFields(FieldList $fields) {    
    /*
      APPEARANCE TAB
    */

    $tab = 'Root.Appearance.Text';
    
    $conf=GridFieldConfig_RelationEditor::create(10);
    $conf->removeComponentsByType('GridFieldPaginator');
    $conf->removeComponentsByType('GridFieldPageCount');
    $data = DataObject::get('Font');
    $field = new GridField('Font', 'Fonts', $data, $conf);
    $fields->addFieldToTab($tab, $field);

    $conf=GridFieldConfig_RelationEditor::create(10);
    $conf->removeComponentsByType('GridFieldPaginator');
    $conf->removeComponentsByType('GridFieldPageCount');
    $data = DataObject::get('FontSize');
    $field = new GridField('FontSize', 'Font Sizes', $data, $conf);
    $fields->addFieldToTab($tab, $field);
  }
}