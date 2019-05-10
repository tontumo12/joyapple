<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
        $dm=$_POST['a'];
        $code=$_POST['product_code'];
        $name=$_POST['product_name'];
        $price=$_POST['product_price'];
        $trangthai=$_POST['product_state'];
        $info=$_POST['info'];
        $b = $_POST['giatri'];
        $giatri=Array($b);
       
        // $uploaddir = '../assets/images/';ES['product_img']['name']);
        // move_uploaded_file($_FILES['product_img']
        // $uploadfile = $uploaddir . basename($_FIL['tmp_name'], $uploadfile);
       
        $duoi = explode('.', $_FILES['file']['name']);
         // tách chuỗi khi gặp dấu .
        $duoi = $duoi[(count($duoi) - 1)];
        //lấy ra đuôi file
        // Kiểm tra xem có phải file ảnh không
        if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif' || $duoi === 'jpeg') {
        // tiến hành upload
        $uploadfile = basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], '../assets/images/' . $uploadfile);
        quantri::themsp($code,$name,$uploadfile,$price,$trangthai,$info,$dm);
        for ($i=0; $i<sizeof($giatri);$i++) { 
            quantri::lienketspgt($code,$giatri[$i]);
        }
        // if (isset($them)) {
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
        //  }
         }
        
        
        