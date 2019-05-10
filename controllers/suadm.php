<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
            $id_dm = $_POST['id'];
            $id=$_POST['a'];
            $ten=$_POST['name'];
            $result= quantri::suadm($ten,$id,$id_dm);
            if (isset($result)) {
                echo "<div class='alert alert-success alert-dismissible' >
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong class='glyphicon glyphicon-ok'></strong> sửa danh mục thành công</div>";  
                
            } else {
                echo "<div class='alert alert-danger alert-dismissible' style='margin-top:3%'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
               <strong class='glyphicon glyphicon-remove'></strong> buồn</div>";

            }