<?php

//create a connection to live database
$conn = mysqli_connect('localhost', 'root', '');
if ($conn) {
    $select_db = mysqli_select_db($conn ,'polling');
    if (!$select_db) {
        echo"<script>alert('Gagal koneksi ke database. Database tidak ada.');</script>";
    } else{
//        echo "berhasil konek";
    }
} else {
    echo"<script>alert('Gagal koneksi ke server. Server tidak ada.');</script>";
}
?> 