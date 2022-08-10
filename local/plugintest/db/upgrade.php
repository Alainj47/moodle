<?php 

defined('MOODLE_INTERNAL') || die();

/**
 * @param $oldversion
 * @throws ddl_exception
 * @throws downgrade_exception
 * @throws upgrade_exception
 */
function xmldb_local_plugintest_upgrade($oldversion)
{
    global $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2022090902) {

        // Define table plugintest_table to be created.
        $table = new xmldb_table('plugintest_table');

        // Adding fields to table plugintest_table.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('nombre', XMLDB_TYPE_CHAR, '200', null, null, null, null);
        $table->add_field('cantidad', XMLDB_TYPE_INTEGER, '3', null, null, null, null);

        // Adding keys to table plugintest_table.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        // Conditionally launch create table for plugintest_table.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Plugintest savepoint reached.
        upgrade_plugin_savepoint(true, 2022090902, 'local', 'plugintest');
    }

    return true;
}