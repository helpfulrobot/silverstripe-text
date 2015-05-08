<?php

// Set the module directory so we know where JS, etc lives.
define('TEXT_BASE', basename(dirname(__FILE__)));
SiteConfig::add_extension('Text_SiteConfigExtension');
LeftAndMain::require_css(TEXT_BASE . '/css/cms/min.css');