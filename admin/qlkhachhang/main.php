<?php
include("../include/top.php");

	// Số khách hàng trên mỗi trang
	$itemsPerPage = 10;

	// Tính toán số trang dựa trên tổng số khách hàng và số khách hàng trên mỗi trang
	$totalItems = count($nguoidung);
	$totalPages = ceil($totalItems / $itemsPerPage);

	// Xác định trang hiện tại từ tham số 'page' trong URL
	$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

	// Xác định chỉ mục bắt đầu và kết thúc của khách hàng trên trang hiện tại
	$startIndex = ($currentPage - 1) * $itemsPerPage;
	$endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

	// Lấy mảng khách hàng cho trang hiện tại
	$pagedNguoidung = array_slice($nguoidung, $startIndex, $itemsPerPage);

?>

<!-- <p><a class="btn btn-info" href="index.php?action=them">Thêm khách hàng</a></p> -->
<h4 class="text-info">Danh sách khách hàng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Email</th>
        <th class="text-info">Số điện thoại</th>
        <th class="text-info">Mật khẩu</th>
        <th class="text-info">Họ tên</th>
        <th class="text-info">Hình ảnh</th>
        <th class="text-info">Loại quyền</th>
        <th>Trạng thái</th>
        <th>Khóa</th>
    </tr>
    <?php
    foreach ($pagedNguoidung as $n) :
        foreach ($quyen as $q) :
            if ($n["loai"] == "3" && $q["id"] == "3") {
    ?>
                <tr>
                    <td><?php echo $n["email"]; ?></td>
                    <td><?php echo $n["sodienthoai"]; ?></td>
                    <td><?php echo $n["matkhau"]; ?></td>
                    <td><?php echo $n["hoten"]; ?></td>
                    <td><img width="50px" src="../../img/users/<?php echo $n["hinhanh"]; ?>" alt="<?php echo $n["hinhanh"]; ?>" style="width: 150px;height: 150px;"></td>
                    <td><?php echo $q["tenquyen"]; ?></td>
                    <td><?php if ($n["trangthai"] == 1) { ?>
                            <dt class=" text-success font-weight">Hoạt động</dt>
                        <?php } else { ?>
                            <dt class=" text-danger">Khóa</dt>

                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        $trangthai = $n['trangthai'];
                        $buttonText = ($trangthai == '0') ? 'Mở khóa' : 'Khóa';
                        $buttonClass = ($trangthai == '0') ? 'btn btn-success' : 'btn btn-warning';
                        ?>
                        <a href="index.php?action=khoa&id=<?php echo $n['id']; ?>&trangthai=<?php echo $n['trangthai']; ?>" class="<?php echo $buttonClass; ?>"><?php echo $buttonText; ?></a>
                    </td>
                </tr>
    <?php
            }
        endforeach;
    endforeach;
    ?>
</table>
<div class="pagination">
	<?php for ($i = 1; $i <= $totalPages; $i++): ?>
		<?php if ($i == $currentPage): ?>
			<span class="current-page"><?php echo $i; ?></span>
		<?php else: ?>
			<a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>
</div>
<?php include("../include/bottom.php"); ?>