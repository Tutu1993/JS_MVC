<?php

include './database_model.php';

$database = new Database($_POST['table']);

$result = $database->select_d($_POST['data']['columns'],[
	'title[~]' => $_POST['data']['where']['title']
]);

echo json_encode($result);

die();
