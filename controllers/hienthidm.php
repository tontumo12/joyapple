<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
    echo "<ul class='list-group row' style='height:auto; font-size: 25px;'>
        <li class='list-group-item list-group-item-info'>
        <h3>Phân Cấp Menu</h3>
        </li>";
    quantri::alldm(0,"");
    echo "</ul>";