<?php 
// Lưu ý tất cả file này phải ở cùng thư mục mới dùng đc lệnh include bên dưới đại khái là quản lý file cũng tương tự c++
include 'connect.php';
//  Lệnh $_POST là lệnh gửi dữ liệu qua phương thức post tức là phương thức truyền đi ẩn dữ liệu ngược lại với get 
// Lệnh isset là lệnh kiểm tra xem cái trong ngoặc có được thực hiện không (TRUE trong c++)
// Ở đây tóm lại lệnh này là kiểm tra nếu mà người dùng thực hiện hành động gửi đi thông tin (là name trong input file index ấy ) thì trong ngặc được thực hiện 
if(isset($_POST['signUp'])){

    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    // Băm dữ liệu thành md5 
    $password=md5($password);
    $checkEmail="SELECT * From users where email='$email'";
    // Thực hiện truy vấn lấy đối tượng 
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        // Thêm dữ liệu vào database 
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                    VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   //Lấy toàn bộ dữ liệu người dùng 
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    // Nếu có người dùng tồn tại thì hàm này sẽ khởi động tiếp phiên làm việc , cho phép lưu trữ và truy cập dữ liệu phiên trên các trang web khác nhau.
    session_start();
    //Lưu dữ liệu của 1 người dùng 
    $row=$result->fetch_assoc();
    //Lưu địa chỉ email của người dùng vào một biến session, cho phép thông tin này được truy cập trên các trang khác trong cùng một phiên làm việc.
    $_SESSION['email']=$row['email'];
    // Chuyển hướng người dùng đến trang homepage.php 
    header("Location: homepage.php");
    //Kết thúc script để ngăn chặn việc thực thi thêm bất kỳ mã nào sau lệnh này.
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>