<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM loaisanpham WHERE id= $this_id";

    mysqli_query($conn, $sql);

    header('location:LoaiSanPham.php');
?>
