<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/frigobar/admin/hospedes/DAO_Hospedes.php');
$id = $_GET['id'];

$dao = new DAO_Hospedes();
$dao->apagar($id);

header('location: listar.php');