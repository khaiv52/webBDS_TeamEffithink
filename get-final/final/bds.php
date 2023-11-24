<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Trang web bất động sản</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/"> 

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="./bds.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="./index.php">Công ty PPC</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="./index.php">Đăng xuất</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Quản lý hợp đồng<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Quản lý bất động sản
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Bất động sản
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Khách hàng
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Báo cáo
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Tài khoản
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Báo cáo đã lưu</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Tháng trước
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Quý trước
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Trang mạng liên kết 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Khuyến mãi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              @Copyright by EffiThink
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách hợp đồng Bất Động Sản</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="./addHD.php"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm</button></a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Chia sẻ</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Xuất</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Tuần này
          </button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã HĐ</th>
              <th>Mã BĐS</th>
              <th>Họ Tên</th>
              <th>Năm sinh</th>
              <th>SĐT</th>
              <th>CMND</th>
              <th>Địa chỉ</th>
              <th>Giá trị hợp đồng</th>
              <th>Số tiền đã cọc</th>
              <th>Số tiền còn lại</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Place the PHP code here
            include("connect.php");

            // Fetch data from the full_contract table
            $query = "SELECT * FROM full_contract";
            $result = $conn->query($query);

            // Check if there is any data
            if ($result->num_rows > 0) {
                // Fetch rows
                while ($row = $result->fetch_assoc()) {
                    $stt = $row['ID'];
                    $maHD = $row['Full_Contract_Code'];
                    $maBDS = $row['Property_ID'];

                    // Corrected query to get Property_Code from Property table
                    $queryProperty = "SELECT `Property_Code` FROM `Property` WHERE ID = $maBDS";
                    $resultProperty = $conn->query($queryProperty);
                    $rowProperty = $resultProperty->fetch_assoc();
                    $propertyCode = $rowProperty['Property_Code'];

                    $hoTen = $row['Customer_Name'];
                    $namSinh = $row['Year_Of_Birth'];
                    $sdt = $row['Mobile'];
                    $cmnd = $row['SSN'];
                    $diaChi = $row['Customer_Address'];
                    $giaTriHopDong = $row['Price'];
                    $soTienDaCoc = $row['Deposit'];
                    $soTienConLai = $row['Remain'];
                    $trangThai = $row['Status'];
                    ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $maHD; ?></td>
                <td><?php echo $propertyCode; ?></td>
                <td><?php echo $hoTen; ?></td>
                <td><?php echo $namSinh; ?></td>
                <td><?php echo $sdt; ?></td>
                <td><?php echo $cmnd; ?></td>
                <td><?php echo $diaChi; ?></td>
                <td><?php echo $giaTriHopDong; ?></td>
                <td><?php echo $soTienDaCoc; ?></td>
                <td><?php echo $soTienConLai; ?></td>
                <td><?php echo $trangThai; ?></td>
            </tr>
            <?php
                }
            } else {
                echo "0 results";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="./app.js"></script>
  </body>
</html>
