<?php

require_once('../../config.php');
require_once("classes/plugin_class.php");

require_login();
/**
 * @var moodle_page $PAGE
 * @var core_renderer $OUTPUT;
 */
global $PAGE, $OUTPUT, $CFG, $DB;

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/plugintest/view.php'));

echo $OUTPUT->header();
echo "Hola";

$test = plugin_class::get_plugintest();

$courses = plugin_class::get_courses();
echo "<pre>";

print_r($courses);

foreach($test as $data){
    print_r($data);
}

echo $OUTPUT->footer();