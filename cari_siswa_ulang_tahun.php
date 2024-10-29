<?php
define('CLI_SCRIPT', true);
require_once(__DIR__ . '/config.php');
global $DB;
// $siswas = $DB->get_record('tabel_siswa', ['kolom_tanggal_lahir' => date('d-m-Y')]);
$siswas = $DB->get_records('siswa', ['tanggal_lahir' => '26-05']);
$DB->insert_records('siswa_ulang_tahun', $siswas);