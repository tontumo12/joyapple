<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
    $id = $_POST['idbv'];
    $tt = quantri::xoabv($id);
    if (isset($tt)) {
        echo "<div class='alert alert-success alert-dismissible' >
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong class='glyphicon glyphicon-ok'></strong> xóa sản phẩm $id thành công</div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible' style='margin-top:3%'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong class='glyphicon glyphicon-remove'></strong> xóa sản phẩm thất bại</div>";
    }
   