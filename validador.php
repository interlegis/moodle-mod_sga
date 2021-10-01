<?php

require('../../config.php');

// FIXME 
$code = required_param('code', PARAM_TEXT); // código do documento que se deseja validar

// AKFS_LAJJDS_MDLJR

$conn = oci_connect($CFG->sgadbhost, $CFG->sgadbpass, $CFG->sgadbhost);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement
//$stid = oci_parse($conn, 'SELECT * FROM tbl_curso');
// FIXME substituir call_protocolo por validaDocumento('ABCD')
$stid = oci_parse($conn, "begin :ret := valida_documento('ABCD'); end;");
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

oci_bind_by_name($stid, ':ret', $r, 200);

// Perform the logic of the query
if (!oci_execute($stid)) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} 


// // Fetch the results of the query
// print "<table border='1'>\n";
// while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
//     print "<tr>\n";
//     print "    <td>" . $row[1] . "</td>\n";
//     //foreach ($row as $item) {
//       //  print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
//     //}
//     print "</tr>\n";
// }
// print "</table>\n";

oci_free_statement($stid);
oci_close($conn);


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

echo html_writer::div("Result is: ".$r);

echo $OUTPUT->footer();
