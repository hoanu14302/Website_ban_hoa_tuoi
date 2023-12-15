<?php include("include/top.php"); ?>

<body>
    <main class="d-flex w-100" style="margin-bottom: 10%;">
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
                                    <form action="index.php" method="post" enctype="multipart/form-data" autocomplete="on" onsubmit="return validateForm()">
                                        <input type="hidden" name="txtloai" value="3">
                                        <input type="hidden" name="txttrangthai" value="1">
                                        <div class="mb-3">
                                            <label class="form-label">Email:</label>
                                            <input class="form-control form-control-lg" type="email" name="txtemail" placeholder="Nhập email" id="emailInput" />
                                            <small id="emailError" class="text-danger"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu:</label>
                                            <input class="form-control form-control-lg" type="password" name="txtmatkhau" placeholder="Nhập mật khẩu" />
                                        </div>
                                        <div class="my-3">
                                            <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                                            <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="txtdiachi" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại:</label>
                                            <input class="form-control form-control-lg" type="text" name="txtsodienthoai" placeholder="Nhập số điện thoại" id="phoneInput" />
                                            <small id="phoneError" class="text-danger"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Họ tên:</label>
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
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<script>
    function validateForm() {
        var email = document.getElementById("emailInput").value;
        var phone = document.getElementById("phoneInput").value;
        var emailError = document.getElementById("emailError");
        var phoneError = document.getElementById("phoneError");

        // Kiểm tra email
        if (email.indexOf("@") === -1) {
            emailError.innerText = "Email phải chứa ký tự @";
            return false; // Ngăn form submit
        }

        // Kiểm tra số điện thoại
        if (!/^\d{10}$/.test(phone)) {
            phoneError.innerText = "Số điện thoại phải có 10 chữ số";
            return false; // Ngăn form submit
        }

        return true; // Cho phép form submit
    }
</script>

<?php include("include/bottom.php"); ?>