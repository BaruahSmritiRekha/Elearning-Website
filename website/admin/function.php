<?php

function createImage($result){
    global $con;
    if(!$result){
        die("Query field" .mysqli_error($con));
    }
}

function createVideo($result){
    global $con;
    if(!$result){
        die("Query field" .mysqli_error($con));
    }
}

function createPdf($result){
    global $con;
    if(!$result){
        die("Query field" .mysqli_error($con));
    }
}


