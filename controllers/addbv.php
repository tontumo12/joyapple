<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
$dm = $_POST['category'];
$tite = $_POST['tite'];
$nd = $_POST['nd'];
$duoi = explode('.', $_FILES['file']['name']);
$duoi = $duoi[(count($duoi) - 1)];
if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif' || $duoi === 'jpeg') {
    // tiến hành upload
    $uploadfile = basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/images/' . $uploadfile);
    quantri::thembv($tite,$uploadfile,$nd,$dm);
    echo "<div class='alert alert-success alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong class='	glyphicon glyphicon-ok'></strong> Thêm sản phẩm thành công
            </div>";
}
else{
    echo "<div class='alert alert-danger alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong class='	glyphicon glyphicon-ok'></strong> Thêm sản phẩm thất bại
            </div>";
}