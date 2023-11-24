<?php

// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Tên máy chủ MySQL, thường là localhost
$username = "root"; // Tên đăng nhập MySQL
$password = ""; // Mật khẩu MySQL
$database = "quanlybds_team09"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Thiết lập bảng ký tự
mysqli_set_charset($conn, "utf8");

?>
