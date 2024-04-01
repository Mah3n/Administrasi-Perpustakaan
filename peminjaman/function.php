<?php

function terlambat($tgl_deadline, $tgl_kembali)
{

    $tgl_deadline_pecah = explode("-", $tgl_deadline);
    $tgl_deadline_pecah = $tgl_deadline_pecah[2] . "-" . $tgl_deadline_pecah[1] . "-" . $tgl_deadline_pecah[0];

    $tgl_kembali_pecah = explode("-", $tgl_kembali);
    $tgl_kembali_pecah = $tgl_kembali_pecah[2] . "-" . $tgl_kembali_pecah[1] . "-" . $tgl_kembali_pecah[0];

    $selisih = strtotime($tgl_kembali_pecah) - strtotime($tgl_deadline_pecah);
    $selisih = $selisih / 86400;

    if ($selisih >= 1) {
        $hasil_tanggal = floor($selisih);
    } else {
        $hasil_tanggal = 0;
    }
    return $hasil_tanggal;
};
?>