<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, 
shrink-to-fit=no">
    <link rel="preconnect" href="https://">
    <title>Đăng ký - ABC Shop</title>
    <link href="../inc/css/app.css" rel="stylesheet">
    <script src="../inc/js/app.js"></script>
    <link href="https://" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://" rel="stylesheet">

</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Xin chào!</h1>
                            <p class="lead">Vui lòng đăng ký để tiếp tục</p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
                                        <input type="hidden" name="txtloai" value="3">
                                        <input type="hidden" name="txttrangthai" value="1">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="txtemail" placeholder="Nhập email" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu</label>
                                            <input class="form-control form-control-lg" type="password" name="txtmatkhau" placeholder="Nhập mật khẩu" />
                                        </div>
                                        <div class="my-3">
                                            <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                                            <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="txtdiachi"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input class="form-control form-control-lg" type="text" name="txtsodienthoai" placeholder="Nhập số điện thoại" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Họ tên</label>
                                            <input class="form-control form-control-lg" type="text" name="txthoten" placeholder="Nhập họ tên" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hình ảnh</label>
                                            <input type="file" class="form-control" name="fhinhanh">
                                        </div>

                                        <div class="d-grid gap-2 my-3">
                                            <input type="hidden" name="action" value="xldangky">
                                            <input type="submit" class="btn btn-lg btn-primary" value="Đăng Ký">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="text-center mb-3">
                            Chưa có tài khoản? <a href="index.php?action=dangky">Đăng ký</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>