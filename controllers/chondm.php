<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
        echo "<option value = 0>----ROOT----</option>";
        quantri::chondm(0,"");