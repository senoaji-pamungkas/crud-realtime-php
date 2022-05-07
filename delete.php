<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_siswa WHERE id='$id' ");
header("location:index.php");
