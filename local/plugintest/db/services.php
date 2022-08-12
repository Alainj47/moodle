<?php

defined('MOODLE_INTERNAL') || die();

$functions = array(
    'local_plugintest_course' => array(
        'classname'    => 'local_plugintest\external\cursos',
        'methodname'   => 'cursos',
        'description'  => 'Devolver curso',
        'type'         => 'read',
        'services' => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
        'ajax' => true,
        'loginrequired' => false
    ),    
);

$services = array(
    'pubsub' => array(
        'functions' => array(
            'local_plugintest_course',
        ),
        'component' => 'local_plugintest',
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'local_plugintest_ws'
    )
);
