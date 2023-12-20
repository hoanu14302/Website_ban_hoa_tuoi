<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Shop đồ bảo hộ Clovia.</title>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body id="top" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #3b5d50;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php" style="color: #ffffff !important;"><img src="../img/logo.png" width="40px"></i>Clovia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent;"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php" >Trang chính</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=aboutus" >Giới thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Danh mục sản phẩm</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                            <?php foreach ($danhmuc as $d) : ?>
                                <li><a class="dropdown-item" href="?action=group&id=<?php echo $d["id"]; ?>">
                                        <?php echo $d["tendm"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-5 ">
                        <form class="d-flex" method="post" action="index.php?action=search">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Search" name="txtsearch">
                                <!-- <input type="submit" class="form-control bg-info btn btn-outline-light" name="timkiem" value="tìm kiếm"> -->
                                <button type="submit" class=" btn btn-light" name="timkiem"><i class="bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-7 ">
                        <div class="d-flex">
                            <?php if (isset($_SESSION["nguoidung"])) { ?>
                                <a href="index.php?action=hoso&id=<?php echo $_SESSION["nguoidung"]["id"]; ?>" class="text-decoration-none text- btn">Xin chào bạn <?php echo $_SESSION["nguoidung"]["hoten"]; ?></a>&nbsp;
                                <a href="index.php?action=dangxuat" class="btn btn-outline-light"><i class="bi bi-box-arrow-left"></i></a>&nbsp;
                            <?php } else { ?>
                                <a href="index.php?action=dangnhap" class="btn btn-outline-light"><i class="bi bi-person"></i> </a>&nbsp;
                            <?php } ?>
                            <a href="index.php?action=xemgiohang" class="btn btn-outline-light"><i class="bi bi-cart3"></i><span class="badge bg-danger text-white ms-1 rounded-pill"><?php echo demsoluongtronggio(); ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Section-->
    <section class="py-5" style="background-color: #f1f1f1;">
        <div class="container px-4 px-lg-5 mt-1">