<?php

function local_plugintest_extend_navigation(global_navigation $navigation) {   
    global $USER;
    $context = context_system::instance();

    if (has_capability('local/plugintest:view', $context, $USER->id) || is_siteadmin()) { 
        $url = new moodle_url('/local/plugintest/view.php');
        $node = navigation_node::create(
            get_string('pluginname', 'local_plugintest'),
            $url,
            navigation_node::TYPE_SETTING,
            null,
            null,
            new pix_icon('i/scheduled', '')
        );
        $node->showinflatnavigation = true;
        $node->classes = array('localplugintest');
        $node->key = 'localplugintest';

        if (isset($node) && isloggedin()) {
            $navigation->add_node($node);
        }
    }    
}
