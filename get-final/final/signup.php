<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra xem tất cả các trường đã được điền đầy đủ hay chưa
        if (!empty($_POST['uname']) && !empty($_POST['psw']) && !empty($_POST['re-type'])) {
            // Lấy dữ liệu từ biểu mẫu
            $username = $_POST['uname'];
            $password = $_POST['psw'];
            $retypePassword = $_POST['re-type'];

            // Kiểm tra xem mật khẩu và mật khẩu nhập lại có khớp nhau không
            if ($password === $retypePassword) {
                // Mật khẩu khớp, bạn có thể thực hiện xử lý lưu thông tin vào cơ sở dữ liệu hoặc thực hiện các hành động khác tùy thuộc vào yêu cầu của bạn.
                // Lưu ý: Trong ứng dụng thực tế, bạn nên sử dụng phương pháp mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu.

                // Ví dụ: In ra thông báo
                echo "Đăng ký thành công!";
            } else {
                // Mật khẩu không khớp, bạn có thể thực hiện các hành động phù hợp, ví dụ như hiển thị thông báo lỗi.
                echo "Mật khẩu không khớp!";
            }
        } else {
            // Một hoặc vài trường không được điền, thực hiện các xử lý phù hợp, ví dụ như hiển thị thông báo lỗi.
            echo "Vui lòng điền đầy đủ thông tin!";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./login.css">
</head>
<body>
    <h2>Công ty PPC</h2>
    <form action="./bds.html" method="post">
      <div class="container">
        <label for="uname"><b>Tài khoản</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="psw"><b>Mật Khẩu</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <label for="re-type"><b>Mật Khẩu</b></label>
        <input type="password" placeholder="Enter Re-type Password" name="re-type" required>
        <button type="submit">Đăng Ký</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Lưu thông tin
        </label>
      </div>

      <a href="#">Quên mật khẩu ?</a>
      <a href="#">@Copyright by EffiThink</a>
    
      <div class="container" style="background-color:#f1f1f1c4">
        
      </div>
    </form>
    
    </body>
    </html>
    