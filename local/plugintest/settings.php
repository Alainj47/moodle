<?php

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {


    $settings = new admin_settingpage('local_plugintest', 'Configuración de Plugin Test');

    // Create 
    $ADMIN->add('localplugins', $settings);

    // Add a setting field to the settings for this page
    $settings->add(new admin_setting_configtext(
            'local_plugintest/textoprueba',
            get_string('textoprueba', 'local_plugintest'),
            get_string('textoprueba_desc', 'local_plugintest'),
            'TExto por default', 
            PARAM_TEXT
    ));
}