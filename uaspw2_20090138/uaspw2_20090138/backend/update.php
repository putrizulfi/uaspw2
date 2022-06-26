<?php
require_once '../koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);
$sql = "update surat_masuk set " .
        "  id='" . $data->id . "'," .
       "  nomor_surat='" . $data->nomor_surat . "'," .
       "  tanggal='" . $data->tanggal . "', " .
       "  pengirim='" . $data->pengirim . "' " .
       " where id='" . $data->id . "'";
$result = pg_query($sql);
$row = pg_affected_rows($result);
$obj = new stdClass();
if($row > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>