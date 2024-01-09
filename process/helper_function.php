<?php

function generateKode() {
    $number = mt_rand(1, 999);  // Menggunakan angka acak sebagai dasar
    $formattedNumber = str_pad($number, 3, '0', STR_PAD_LEFT);
    $kode = "kd_" . $formattedNumber;
    return $kode;
}

?>