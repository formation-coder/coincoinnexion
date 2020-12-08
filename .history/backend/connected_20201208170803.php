<?php 

    session_start(); 
    if(!empty($_SESSION['utilisateur'])) {
        echo json_encode(["connected" => true]);
    } else {
        echo json_encode(["connected" => false]);
    }