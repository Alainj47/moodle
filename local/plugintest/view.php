<?php

require_once('../../config.php');
require_once("classes/plugin_class.php");
require_once($CFG->libdir.'/tablelib.php');
require_once('classes/data_table.php');

require_login();
/**
 * @var moodle_page $PAGE
 * @var core_renderer $OUTPUT;
 */
global $PAGE, $OUTPUT, $CFG, $DB;

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/plugintest/view.php'));
//$PAGE->set_title('Example Report');
//$PAGE->set_heading('Reporte');
//echo $OUTPUT->header();

$test = plugin_class::get_plugintest();

$all_courses = plugin_class::get_all_courses();

$all_users =  plugin_class::get_all_users();

$courses = [];

foreach($all_courses as $course){
    $data = array(
        'fullname' => $course->fullname,
        'shortname' => $course->shortname,
        'timecreated' => $course->timecreated,
    );
    array_push($courses, $data);
}

$users = [];

foreach($all_users as $user){
    $data = array(
        'username' => $user->username,
        'firstname' => $user->firstname,
        'lastname' => $user->lastname,
        'email' => $user->email,
    );
    array_push($users, $data);
}



//echo $OUTPUT->render_from_template('local_plugintest/reporte', array('cursos' => $courses, 'users' => $users));

$download = optional_param('download', '', PARAM_ALPHA);

$table = new data_table('id');

$table->is_downloading($download, 'Feedback Report', 'Feedback Report');

$fields = 'aa.*';
$from = '{user} aa';
$where = '1=1';

if (!$table->is_downloading()) {        
    $PAGE->set_title('Feedback Report');
    $PAGE->set_heading('Reporte');   
    echo $OUTPUT->header(); 
         
}

$table->set_sql($fields, $from, $where);
$table->define_baseurl("$CFG->wwwroot/local/plugintest/view.php");
$table->out(20, true);

/* echo "<pre>";

print_r($users);

foreach($test as $data){
    print_r($data);
}
 */
echo $OUTPUT->footer();