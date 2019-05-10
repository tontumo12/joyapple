<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
if (isset($_POST['add_pro'])) {
    $ten = $_POST['pro_name'];
    quantri::themtt($ten);
    header('location:../views/quảntrị/index.php?controller=themsp');
}
elseif (isset($_POST['add_val'])) {
        $ten = $_POST['var_name'];
        $id_tt = $_POST['id_pro'];
        quantri::themgt($ten,$id_tt);
        header('location:../views/quảntrị/index.php?controller=themsp');
}
