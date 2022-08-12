<?php

namespace local_plugintest\external;

use dml_exception;
use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;
use invalid_parameter_exception;
use moodle_exception;

defined('MOODLE_INTERNAL') || die;

class cursos extends external_api
{
	/**
	 * @return external_function_parameters
	 */
	public static function cursos_parameters()
	{

		return new external_function_parameters(
			array(
				'id' => new external_value(PARAM_RAW, 'Id del curso'),
			)
		);
	}

	/**
	 * @param $id
	 * @return array
	 * @throws dml_exception
	 * @throws invalid_parameter_exception
	 * @throws moodle_exception
	 */
	public static function cursos($id)
	{
		// @codingStandardsIgnoreLine
		/** @var \moodle_database $DB */
		global $DB;
		$params = self::validate_parameters(
			self::cursos_parameters(),
			array(
				'id' => $id
			)
		);

        $curso = $DB->get_record('course', array('id' => $params["id"]));

        return [
            "fullname" => $curso->fullname,
            "shortname" => $curso->shortname
        ];
	}

	/**
	 * @return external_single_structure
	 */
	public static function cursos_returns()
	{
		return new external_single_structure(
            array(
                'fullname' => new external_value(PARAM_RAW),
                'shortname' => new external_value(PARAM_RAW)
            )
        );
	}
}
