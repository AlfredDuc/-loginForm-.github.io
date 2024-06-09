<?php
// kết thúc phiên và quay lại index trang đăng nhập 
session_destroy();
header("location: index.php");
?>