<?php

use core\analytics\analyser\courses;

class plugin_class{

    public static function get_plugintest(){
        global $DB;

        $datos = $DB->get_records('plugintest_table', array());

        return $datos;
    }

    public static function get_courses(){
        
        return get_courses();
    }

    public static function get_enrols(){

        global $USER;

        return enrol_get_all_users_courses($USER->id);
    }

    public static function get_all_users(){

        return get_users();
    }
}