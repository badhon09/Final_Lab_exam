<?php

require_once('../db/db.php');

function getAllUser(){
    $con = dbConnection();
    $sql = "select * from admins";
    $result = mysqli_query($con, $sql);
    $users =[];
    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    };
    return $users;
}


function create($user){
    $con = dbConnection();
    $sql = "insert into admins values({$user['username']}', '{$user['email']}','{$user['password']}')";

    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}




?>