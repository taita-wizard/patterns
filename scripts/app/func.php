<?php

function filterFio($fio)
{
    $tmp = str_word_count(mb_ucwords($fio), 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");

    if (count($tmp) != 3) {
        return false;
    }

    $fio = implode(" ", $tmp);
    $fio = strip_tags($fio);
    $fio = htmlspecialchars($fio);

    return $fio;
}

function filterPhone($phone)
{
    if (!preg_match("/^\+\d{1}-\(\d{3}\)-\d{3}-\d{2}-\d{2}$/", $phone)) {
        return false;
    }
    return $phone;
}

function filterCountry($country_id)
{
    global $countriesArray;
    $country_id = intval($country_id);
    if (!isset($countriesArray[$country_id])) {
        return false;
    }
    return $country_id;
}


function mb_ucwords($str)
{
    $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    return $str;
}

function filterSearch($str)
{
    if (!preg_match("/^[а-яА-ЯЁё ]+$/u", $str, $m)) {
        return false;
    }
    return $str;
}

function cmpAsc($a, $b)
{

    if ($a['fio'] == $b['fio']) {
        return 0;
    }
    return ($a['fio'] < $b['fio']) ? -1 : 1;
}
function cmpDesc($a, $b)
{

    if ($a['fio'] == $b['fio']) {
        return 0;
    }
    return ($a['fio'] > $b['fio']) ? -1 : 1;
}