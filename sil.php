<?php
$connect = mysqli_connect("###.###.###.##:####", "########", "################", "####");
$output = '';
$connect->set_charset("utf8");
?>

 <?php 

if ($_GET) 
{

if ($connect->query("DELETE FROM satislar WHERE SiraNo =".(int)$_GET['SiraNo'])) 
{
    header("location:index.php");
}
}

?>