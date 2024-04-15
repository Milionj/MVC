<?php


function redirect($page){

    header('refresh: 2; url="' . URLROOT . '/' . $page.'"');

}