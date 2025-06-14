<?php

require 'koneksi.php';
session_start();

if(isset($_POST['login'])){
    // menangkap data yang dikirim dari form
    $inputEmail = $_POST['inputEmail'];
    $inputPassword = $_POST['inputPassword'];
        
    // menyeleksi data admin dengan username dan password yang sesuai
    $data = mysqli_query($koneksi,"select * from login where email='$inputEmail' and password='$inputPassword'");
        
    // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
        if($cek > 0){
            $_SESSION['log']= 'True';       
            $_SESSION['email']= $inputEmail;       
            header("location:index.php");
        } else {
            header("location:login.php");
        };
};

    if(!isset($_SESSION['log']))
    {
        
    } else {
        header('location:index.php');
    }




?>