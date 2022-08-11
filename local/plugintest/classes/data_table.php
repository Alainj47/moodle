<?php

class data_table extends table_sql {

    function __construct($uniqueid) {
        parent::__construct($uniqueid);
        $columns = array('id', 'firstname', 'lastname','email');
        $this->define_columns($columns);    

        $headers = array(
            'id',
            'Nombre',
            'Apellido',
            'Email',
        );
        $this->define_headers($headers);
    }
}