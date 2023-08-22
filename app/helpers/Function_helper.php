<?php

function tanggal_indo($tgl, $hr = false)
{
    $hari = getHari(date('N', strtotime($tgl)));
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    if ($hr) {
        return $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function tgl_indo($tgl, $hr = false)
{
    $hari = getHari(date('N', strtotime($tgl)));
    $jam = substr($tgl, 11, 5);
    // $mnt = substr($tgl, 14, 2);
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $shortBulan = getShortBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    if ($hr) {
        return $tanggal . ' ' . $shortBulan . ' ' . $tahun . ', ' . $hari . ' ' . $jam;
    }
    return $tanggal . ' ' . $shortBulan . ' ' . $tahun;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function getShortBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Agu";
            break;
        case 9:
            return "Sept";
            break;
        case 10:
            return "Okt";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Des";
            break;
    }
}

function getHari($hr)
{
    switch ($hr) {
        case 1:
            return "Senin";
            break;
        case 2:
            return "Selasa";
            break;
        case 3:
            return "Rabu";
            break;
        case 4:
            return "Kamis";
            break;
        case 5:
            return "Jumat";
            break;
        case 6:
            return "Sabtu";
            break;
        case 7:
            return "Minggu";
            break;
    }
}
