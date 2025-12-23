<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Database connection (Change credentials accordingly)
        $servername = "localhost";
        //$username = "dualstre_Federal Credit Union Holdings";
        $username = "fede_federalholding";
        $password = "z6AwZFtHD7RPqQrM3t97";
        //$dbname = "dualstre_Federal Credit Union Holdings";
        $dbname = "fede_federalholding";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // if($conn){
        //     echo "connected successfully";
        // }else{
        //     echo "connection failed";
        // }

        ?> 