<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 01.12.2016
 * Time: 13:44
 */
include_once __DIR__ . "/db.php";
include_once __DIR__ . "/func.php";
$countriesArray = $users = [];
foreach (DB::query("SELECT * FROM country") as $row)
    $countriesArray[$row['id']] = $row['name'];

foreach (DB::query("SELECT * FROM user") as $row)
    $users[$row['id']] = $row;

$search = false;
if (isset($_GET['search'])) {
    $search = filterSearch($_GET['search']);
    $users = [];
    if ($search)
        foreach (DB::query("SELECT * FROM user WHERE `fio` LIKE '%{$search}%'") as $row)
            $users[$row['id']] = $row;

}
$sort = 1;
if (isset($_GET['sort'])) {
    $sort = intval($_GET['sort']);
    if ($sort === 1)
        usort($users, 'cmpAsc');
     elseif ($sort === 0)
        usort($users, 'cmpDesc');
}

if (!empty($_POST)) {
    $fio = filterFio($_POST['fio']);
    $phone = filterPhone($_POST['phone']);
    $country = filterCountry($_POST['country']);

    if ($fio !== false && $phone !== false && $country !== false) {
        if (isset($_GET['edit']))
            DB::query("UPDATE `user` SET fio = '{$fio}', phone='{$phone}', country_id=$country WHERE id=" . intval($_GET['edit']) . " LIMIT 1");
        else
            DB::query("INSERT INTO `user` (fio, phone, country_id) VALUES ('{$fio}', '{$phone}', $country)");

        header("Location: " . $_SERVER["REQUEST_URI"]);
    }
}
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    foreach (DB::query("SELECT * FROM user WHERE id={$id}") as $row)
        $user = $row;
}
include __DIR__."/layout.php";

