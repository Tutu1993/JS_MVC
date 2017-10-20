<?php

// 定义当前路径
define('ROOT', dirname(__FILE__).'/');

// 定义白名单及其他参数
$whitelist = array('jpg', 'jpeg', 'png', 'gif');
$name      = null;
$error     = 'No file uploaded.';
$address   = array();

if (isset($_FILES)) {
    foreach ($_FILES as $value) {
        $tmp_name = $value['tmp_name'];
        $name     = MD5(time().rand(1111, 9999)).'.'.explode('.', basename($value['name']))[1];
        $error    = $value['error'];

        if ($error === UPLOAD_ERR_OK) {
            $extension = pathinfo($name, PATHINFO_EXTENSION);

            if (!in_array($extension, $whitelist)) {
                $error = 'Invalid file type uploaded.';
            } else {
                $dir = iconv("UTF-8", "GBK", ROOT."../../public/image/upload");

                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                move_uploaded_file($tmp_name, ROOT.'../../public/image/upload/'.$name);
                array_push($address, '/public/image/upload/'.$name);
            }
        }
    }
}

echo json_encode(array(
    'errno' => 0,
    'data'  => $address,
));

die();
