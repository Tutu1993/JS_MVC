<?php
include './database_model.php';
session_start();

if ($result) {
	$_SESSION['isLogin'] = 'true';
	echo json_encode(true);
} else {
	if (isset($_SESSION['isLogin']))
		unset($_SESSION['isLogin']);
	echo json_encode(false);
}

die();
