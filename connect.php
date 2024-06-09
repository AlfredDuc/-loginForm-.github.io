<?php
// Truy cập vào kết nối tài khoản của phpmyadmin thông thường thì sẽ cố định tk mk này 
$host="localhost";
$user="root";
$pass="";
// Tên databases là tên vừa tạo 
$db="login";
//Kết nối vào trường bản ghi trong database vừa tạo 
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    // Lệnh in chữ tương tự cout bên c++ 
    echo "Failed to connect DB".$conn->connect_error;
}
?>