<?php

// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 */
require_once($CFG->libdir . "/externallib.php");

class mod_sga_external extends external_api {
    
   public static function get_notas_curso() {
        global $USER;

        // TODO: obter as notas do aluno no curso
        // e retornar como JSON
        // ver exemplo https://github.com/interlegis/moodle-local_wsilb/blob/main/externallib.php


        $nota1 = array(
            "aluno" => '05272886674',
            "nota" => "9", 
        );

        $nota2 = array(
            "aluno" => '13504211628',
            "nota" => '8'
        );

        $notas= array($nota1, $nota2);

        $obj = new StdClass();
        $obj->curso = 123;
        $obj->notas = $notas;

        $json = json_encode($obj);

        return $json;
        '
        {
            "curso":123,
            "notas":[
               {
                  "aluno":"05272886674",
                  "nota":9
               },
               {
                  "aluno":"13504211628",
                  "nota":8
               }
            ]
         }'; 
    }

    public static function get_notas_curso_parameters() {
        return new external_function_parameters(
                array(PARAM_INT, 'Código do curso')
        );
    }

    public static function get_notas_curso_returns() {
        return new external_value(PARAM_TEXT, 'JSON com notas dos alunos no curso especificado');
    }

}

