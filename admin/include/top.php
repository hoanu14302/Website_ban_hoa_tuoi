<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Trang quản trị - Elko Garden</title>

	<link href="../include/css/app.css" rel="stylesheet">
	<script src="../include/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />


</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../../admin/ktnguoidung/">
					<span class="align-middle">Elko Garden</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-info">
						HỆ THỐNG
					</li>

					<!-- <li class="sidebar-item <?php if (strpos($_SERVER["REQUEST_URI"], "ktnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../ktnguoidung/main.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Bảng điều khiển</span>
						</a>
					</li> -->
					<?php if ($_SESSION["nguoidung"]["loai"] == 1) { ?>
						<li class="sidebar-item  <?php if (strpos($_SERVER["REQUEST_URI"], "qlnguoidung") != false) echo "active"; ?> ">
							<a class="sidebar-link" href="../qlnguoidung/index.php">
								<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý người dùng</span>
							</a>
						</li>
					<?php } ?>
					<li class="sidebar-header text-info">
						DANH MỤC
					</li>

					<li class="sidebar-item  
					<?php if (strpos($_SERVER["REQUEST_URI"], "qldanhmuc") != false) echo "active"; ?>
					">
						<a class="sidebar-link" href="../qldanhmuc/index.php">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Quản lý danh mục</span>
						</a>
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER["REQUEST_URI"], "qlmathang") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlmathang/index.php">
							<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý mặt hàng</span>
						</a>
					</li>

					<li class="sidebar-header text-info">
						KINH DOANH
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER["REQUEST_URI"], "qlkhachhang") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlkhachhang/index.php">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý khách hàng</span>
						</a>
					</li>

					<li class="sidebar-item
					<?php if (strpos($_SERVER["REQUEST_URI"], "qldonhang") != false) echo "active"; ?>
					">
						<a class="sidebar-link" href="../qldonhang/index.php">
							<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Quản lý đơn hàng</span>
						</a>
					</li>
					<li class="sidebar-item <?php if (strpos($_SERVER["REQUEST_URI"], "chuongtrinhkhuyenmai") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../chuongtrinhkhuyenmai/index.php">
							<i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Chương trình khuyến mãi</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									1 thông báo mới
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Đơn hàng mới</div>
												<div class="text-muted small mt-1">Xem danh sách đơn hàng chờ xác nhận.</div>
												<div class="text-muted small mt-1">5 phút trước</div>
											</div>
										</div>
									</a>

								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Tất cả thông báo</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										1 tin nhắn mới
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../../images/users/doraemon.jpg" class="avatar img-fluid rounded-circle" alt="Mèo máy Đô rê mon">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Doraemon</div>
												<div class="text-muted small mt-1">Mail của mèo máy đến từ tương lai nè ^.^</div>
												<div class="text-muted small mt-1">15 phút trước</div>
											</div>
										</div>
									</a>

								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Tất cả tin nhắn</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>
							<!-- Bổ sung một số thông tin vào menu người dùng -->

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="../../img/users/<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>" class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>" />
								<span class="text-dark">
									Chào
									<?php
									if (isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["hoten"];
									else echo "bạn";
									?>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=hoso">
									<i class="align-middle me-1" data-feather="user"></i> Hồ sơ cá nhân
								</a>
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=matkhau">
									<i class="align-middle me-1" data-feather="key"></i> Đổi mật khẩu
								</a>

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=dangxuat">
									<i class="align-middle me-1" data-feather="log-out"></i> Đăng xuất
								</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">