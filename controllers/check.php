<?php
     require_once "../config/connect.php";
     Database::connect();
     require_once "../models/quantri.php";
     $id = $_POST['iddh'];
     $result = quantri::updatedh($id);
     if (isset($result)) {
        echo "<div class='alert alert-success alert-dismissible'>
        <a href='#' onclick='document.getElementByClass('alert').style.display='none'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong  class='glyphicon glyphicon-ok'></strong> chốt đơn thành công
        </div>";  
    } else {
        echo "<div class='alert alert-danger alert-dismissible' style='margin-top:3%'>
        <a href='#' onclick='document.getElementByClass('alert').style.display='none'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong class='glyphicon glyphicon-remove'></strong> chốt đơn thất bại</div>";
    }
?>