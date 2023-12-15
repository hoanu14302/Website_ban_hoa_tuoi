<?php include("../include/top.php"); ?>

<form method="post" action="index.php">
    <input type="hidden" name="action" value="xulythem">

    <div class="md-3 mt-3">
        <label for="txttenkm" class="form-label">Tên khuyến mãi</label>
        <input class="form-control" type="text" name="txttenkm" placeholder="Nhập tên khuyến mãi">
    </div>
    <div class="md-3 mt-3">
        <label for="txtmota" class="form-label">Mô tả</label><br>
        <textarea name="txtmota" id="" cols="100" rows="5"></textarea>
    </div>
    <div class="mb-3 mt-3">
        <label for="txtphantram" class="form-label">Phần trăm giảm</label>
        <input class="form-control" type="number" name="txtphantram" value="0">
    </div>
    <div class="mb-3 mt-3">
        <label>Hình ảnh khuyến mãi</label>
        <input class="form-control" type="file" name="filehinhanh">
    </div>
    <div class="md-3 mt-3">
        <input type="submit" value="Lưu" class="btn btn-success"></input>
        <input type="reset" value="Hủy" class="btn btn-warning"></input>
    </div>
</form>

<?php include("../include/bottom.php"); ?>