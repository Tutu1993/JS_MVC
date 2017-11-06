<?php

session_start();

include './database_model.php';

$result = isset($_POST['table']) ? (isset($_POST['type']) ? (isset($_POST['data']) ? (!isset($_POST['data']['where']) ? 'Please confirm isset [where]' : (new Database($_POST['table']))->has_d($_POST['data']['where'])) : 'Please confirm isset [data]') : 'Please confirm isset [type]') : 'Please confirm isset [table]';

if ($result) {
	$_SESSION['isLogin'] = 'true';
	echo json_encode(true);
} else {
	if (isset($_SESSION['isLogin']))
		unset($_SESSION['isLogin']);
	echo json_encode(false);
}

die();
