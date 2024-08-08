<?php
require_once '../config.php';

$id = $_POST['id'];
$file_path = $_POST['file_path'];

$del='delete from notices where id="' . $id .'"';
if($link->query($del)){
    unlink($file_path);
    header("location: fac_dashboard.php");
}
else{
    echo "error";
}