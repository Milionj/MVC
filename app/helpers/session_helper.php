<?php
session_start();

function checkUserLog(){

    if (isset($_SESSION['user_logged_in'])) {
        return true;
    }
    else{
        return false;
    }
}


function checkUserId() {

    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    }
}