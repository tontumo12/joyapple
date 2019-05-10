<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
    $ten = $_POST['pro_name'];
    quantri::themtt($ten);