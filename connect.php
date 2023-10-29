<?php
    $server ='localhost';
    $user ='root';
    $pass='';
    $database='pj09qlhtk';

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn)
    {
        mysqli_query( $conn,"SET NAMES 'utf8' ");
    }
    else
    {
        echo 'Kết nối không thất bại';
    }
?>