<?php

function filterFio($fio)
{
    $fio = trim($fio);
    $fio = strip_tags($fio);
    $fio = htmlspecialchars($fio);

    return ucfirst($fio);
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