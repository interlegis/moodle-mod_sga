<?php

require('../../config.php');

// FIXME 
$code = required_param('code', PARAM_TEXT); // código do documento que se deseja validar

// AKFS_LAJJDS_MDLJR

// TODO: conectar no oracle, banco do SGA, e chamar function passando o código e interpretar os resultados

// Resultado pode ser inválido (mostrar mensagem de erro de validação)
// ou válido (mostrar dados do documento vindo da function)

$PAGE->set_pagelayout('incourse'); // FIXME trocar para outro tipo de layout

// $strname         = get_string('name');
// $strintro        = get_string('moduleintro');
// $strlastmodified = get_string('lastmodified');

$PAGE->set_url('/mod/sga/validador.php', array('code' => $code));
$PAGE->set_title(get_string('pagetitle'));
$PAGE->set_heading(get_string('pagetitle'));
//$PAGE->navbar->add($strpalestras);

echo $OUTPUT->header();

$saida = '<b>Aluno</b>' . "Fulano" . '<br><b>Curso</b>: ' . 'Direito Legislativo';

echo html_writer::div($saida);

echo $OUTPUT->footer();
