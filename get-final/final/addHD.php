<?php
include("connect.php");

$messages = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $customerName = $_POST['customerName'];
    $birthYear = $_POST['birthYear'];
    $identity = $_POST['identity'];
    $dateContract = $_POST['dateContract'];
    $valueContract = $_POST['valueContract'];
    $money = $_POST['money'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $remain = $_POST['remain'];
    $selectedStatus = $_POST['property_contract'];
    // echo($customerName);
    // echo($birthYear);
    // echo($customerName);
    // echo($identity);
    // echo($dateContract);
    // echo($valueContract);
    // echo($money);
    // echo($address);
    // echo($money);
    // echo($phone);
    // echo($remain);
    // echo($selectedStatus);

    // Truy vấn để lấy thông tin bất đống sản
    $insertQuery = "INSERT INTO `Full_Contract` (`Customer_Name`, `Year_Of_Birth`, `SSN`, `Customer_Address`, `Mobile`, `Property_ID`, `Date_Of_Contract`, `Price`, `Deposit`, `Remain`, `Status`)
    VALUES ('$customerName', '$birthYear', '$identity', '$address', '$phone', 1, '$dateContract', '$valueContract', '$money', '$remain', '$selectedStatus')";

    // Kiểm tra có thông người dùng hay chưa
    if (!empty($customerName) && !empty($birthYear) && !empty($identity) && !empty($dateContract) && isset($valueContract) && isset($money) && !empty($address) && !empty($phone) && isset($remain) && !empty($selectedStatus)) {
        if ($conn->query($insertQuery) === TRUE) {
            header('Location: bds.php');
        } else {
            $messages = "Hợp đồng mới chưa được thêm thành công";
        }
    } else {
        $messages = "Vui lòng nhập đầy đủ thông tin.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang web bất động sản</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #7ca6cb;
      margin: 0;
      height: 100vh;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #fff;
      min-width: 600px;
      padding: 20px 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .newspaper {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 10px;
    }

    label {
      color: #333;
      display: flex;
      align-items: center;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #7ca6cb;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .button {
      border: none;
      background-color: #4caf50;
      color: #fff;
      padding: 15px 60px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #45a049;
    }

    .cancel-button {
      background-color: #f44336;
    }

    .cancel-button:hover {
      background-color: #d32f2f;
    }

    .submit-container {
      display: flex;
      justify-content: space-evenly;
      margin-top: 20px;
    }

    .message-container {
      position: relative;
      background-color: #f2f2f2;
      padding: 15px 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      text-align: center;
    }

    .message {
      font-size: 20px;
      font-weight: bold;
      color: #333;
    }

    .close-button {
      position: absolute;
      right: 10px;
      background-color: #f2f2f2;
      border: none;
      color: red;
      font-size: 20px;
      cursor: pointer;
      font-weight: bold;
    }

    .close-button:hover {
      color: darkred;
    }
  </style>
</head>
<body>

<!-- Tồn tại và không rỗng -->
<?php if (!empty($messages)) : ?>
    <div class="message-container">
        <span class="message"><?php echo $messages; ?></span>
        <button class="close-button" onclick="closeMessage()">x</button>
    </div>
<?php endif; ?>

<div class="container">
  <div class="form-container">
    <h2>THÊM HỢP ĐỒNG</h2>

    <form action="" method="post" onsubmit="return validateForm()">
      <div class="newspaper">

        <label for="customerName">Họ tên người mua:</label>
        <input type="text" id="fname" name="customerName" >

        <label for="birthYear">Năm sinh:</label>
        <select id="birthYear" name="birthYear">
          <script>
          var currentYear = new Date().getFullYear();
          for (var i = currentYear; i >= currentYear - 100; i--) {
          document.getElementById("birthYear").innerHTML += `<option value="${i}">${i}</option>`;
          }
          </script>
        </select>

        <label for="identity">CMND:</label>
        <input type="text" id="identity" name="identity" required>

        <label for="dateContract">Ngày lập hợp đồng:</label>
        <input type="date" id="dateContract" name="dateContract" >

        <label for="valueContract">Giá trị hợp đồng:</label>
        <input type="text" id="valueContract" name="valueContract" >

        <label for="money">Số tiền đã cọc:</label>
        <input type="text" id="money" name="money" >

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" >

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" >

        <label for="remain">Số tiền còn lại:</label>
        <input type="text" id="remain" name="remain" >

        <label for="property_contract">Trạng thái:</label>
        <select id="property_contract" name="property_contract" onchange="getStatus()">
          <option value="1">Đang bán</option>
          <option value="2">Đang hoạt động</option>
          <option value="3">Đã bán thanh toán một lần</option>
          <option value="4">Không hiển thị</option>
          <option value="5">Hết hạn để bán</option>
          <option value="6">Đang cọc đầy đủ</option>
          <option value="7">Đang cọc trả góp</option>
        </select>

        <!-- Add this hidden input for storing the selected status -->
        <input type="hidden" id="selected_status_name" name="selected_status_name">
      </div>
      <br>

      <div class="submit-container">
        <a href="./bds.php"><button class="button cancel-button" type="button" value="Hủy" name="cancel">Hủy</button></a>
        <button class="button" type="submit" value="Lưu" name="submit">Lưu</button>
      </div>
    </form>
  </div>
</div>

<script>
    function getStatus() {
        var selectElement = document.getElementById('property_contract');
        var selectedStatus = selectElement.options[selectElement.selectedIndex].value;

        // Set the value of the hidden input to the selected status name
        document.getElementById('selected_status_name').setAttribute('value', selectedStatus);
    }

  function validateForm() {
    // Kiểm tra xem trường ẩn có giá trị không trước khi gửi biểu mẫu
    var selectedStatus = document.getElementById('selected_status').value;

    if (selectedStatus === "") {
        alert("Vui lòng chọn trạng thái hợp đồng.");
        return false; // Ngăn chặn việc gửi biểu mẫu nếu giá trị không được chọn
    }

    // kiểm tra cmnd không phải là số
    var ssnInput = document.getElementById('identity').value;
    if (isNaN(ssnInput)) {
        alert("CMND phải là số.");
        return true;
    }
    // kiểm tra giá trị nhập vào số tiền không phải là số
    var moneyInput = document.getElementById('money').value;
    if (isNaN(moneyInput)) {
        alert("Số tiền cọc phải là số.");
        return true;
    }

    // kiểm tra giá trị hợp đồng không phải là số
    var valueContractInput = document.getElementById('valueContract').value;
    if (isNaN(valueContractInput)) {
        alert("Giá trị hợp đồng phải là số.");
        return true;
    }

    // kiểm tra số tiền còn lại không phải là số
    var remainInput = document.getElementById('remain').value;
    if (isNaN(remainInput)) {
        alert("Số tiền còn lại phải là số.");
        return true;
    }

    return true; // Form will be submitted if all checks pass
  }

  function closeMessage() {
        var messageContainer = document.querySelector('.message-container');
        messageContainer.style.display = 'none';
    }
</script>
</body>
</html>
