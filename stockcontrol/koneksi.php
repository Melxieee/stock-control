<?php 

    // membuat koneksi ke database
    $koneksi = mysqli_connect("localhost","root","","db_stockcontrol");
    
    // Check connection
    // if($koneksi){
    //     echo 'berhasil';
    // }

    if (mysqli_connect_errno()){
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }
?>