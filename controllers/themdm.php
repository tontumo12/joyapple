<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";

            $id=$_POST['a'];
            $ten=$_POST['name'];
            $result = quantri::themdm($ten,$id);
            $check = quantri::choiseData("tênmd","danhmuc");
            if ($ten == $check) {
                   
                echo "<div class='alert alert-danger alert-dismissible' style='margin-top:3%'>
                <a href='#' onclick='document.getElementByClass('alert').style.display='none'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
               <strong class='glyphicon glyphicon-remove'></strong> thêm danh mục thất bại</div>";
            } else {
                echo "<div class='alert alert-success alert-dismissible'>
                <a href='#' onclick='document.getElementByClass('alert').style.display='none'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong  class='glyphicon glyphicon-ok'></strong> thêm danh mục thành công
                </div>";  
            }
            