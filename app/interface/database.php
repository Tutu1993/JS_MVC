<?php
include './database_model.php';

function switchType ($type, $database, $data) {
	switch ($type) {
		case 'select':
			return !isset($data['columns']) ? 'Please confirm isset [columns]' : (!isset($data['where']) ? 'Please confirm isset [where]' : $database->select_d($data['columns'], $data['where']));
			break;
		case 'insert':
			return !isset($data['data']) ? 'Please confirm isset [data]' : ($database->insert_d($data['data']) === 0 ? false : true);
			break;
		case 'update':
			return !isset($data['data']) ? 'Please confirm isset [data]' : (!isset($data['where']) ? 'Please confirm isset [where]' : ($database->update_d($data['data'], $data['where']) === 0 ? false : true));
			break;
		case 'delete':
			return !isset($data['where']) ? 'Please confirm isset [where]' : ($database->delete_d($data['where']) === 0 ? false : true);
			break;
		case 'get':
			return !isset($data['columns']) ? 'Please confirm isset [columns]' : (!isset($data['where']) ? 'Please confirm isset [where]' : $database->get_d($data['columns'], $data['where']));
			break;
		case 'has':
			return !isset($data['where']) ? 'Please confirm isset [where]' : $database->has_d($data['where']);
			break;
		default:
			return 'type_null';
			break;
	}
}

$result = isset($_POST['table']) ? (isset($_POST['type']) ? (isset($_POST['data']) ? switchType($_POST['type'], new Database($_POST['table']), $_POST['data']) : 'Please confirm isset [data]') : 'Please confirm isset [type]') : 'Please confirm isset [table]';

echo json_encode($result);

die();
