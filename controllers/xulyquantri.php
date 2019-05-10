<?php
require_once "../../models/quantri.php";

if (isset($_GET['controller'])) {
    $điềuhướng = $_GET['controller'] ;
    if (isset($_GET['action'])) {
        $hànhđộng = $_GET['action'];
    } else {
        $hànhđộng = "index";
    }
    
 } else {
    $điềuhướng="page";
    $hànhđộng="home";
 }
switch ($điềuhướng) {
    case 'danhmucsp':
        require_once "category.php";
        break;
    case 'suadanhmucsp':
        $id_dm=$_GET['id_dm'];
        $ht = quantri::showDm($id_dm);
        require_once "editcategory.php";
        break;
    case 'xoadm':
        $id_dm=$_GET['id_dm'];
        quantri::xoadm($id_dm);
        header('Location:index.php?controller=danhmucsp');
        break;  
    case 'themsp':
        $tt = quantri::layidtt();
        require_once "addproduct.php"; 
        break;
    case 'danhsachsp':
        $hienthi = quantri::hienthisp();
        require_once "list.php";
        break;
    case 'danhsachbv':
        $hienthi = quantri::showlist();
        require_once "news.php";
        break;
    case 'addbaiviet':
        require_once "addnews.php";
        break;
    case 'order':
        $info = quantri::info();
        require_once "order.php";
        break;
    case 'donhang':
        $id = $_GET['id'];
        $info = quantri::chitiet($id);
        $order = quantri::order($id);
        require_once "orderinfo.php";
        break;
    default:
        require_once "main.php";
        break;
}