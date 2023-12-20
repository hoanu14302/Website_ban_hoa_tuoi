<?php include("include/top.php"); 
// Số mặt hàng trên mỗi trang
$itemsPerPage = 10;

// Tính toán số trang dựa trên tổng số mặt hàng và số mặt hàng trên mỗi trang
$totalItems = count($mathang);
$totalPages = ceil($totalItems / $itemsPerPage);

// Xác định trang hiện tại từ tham số 'page' trong URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Xác định chỉ mục bắt đầu và kết thúc của mặt hàng trên trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

// Lấy mảng mặt hàng cho trang hiện tại
$pagedMathang = array_slice($mathang, $startIndex, $itemsPerPage);
?>

<h3 class="text-dark"><?php echo $tendm; ?></h3>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <?php
    if ($mathang != null) {
        foreach ($mathang as $m) :
    ?>
            <div class="col mb-5">
                <div class="card h-100 shadow">
                <!-- Expired product-->
                <?php if ($m["soluongton"] == 0) { ?>
                            <div class="badge bg-danger text-white position-absolute" style="text-align: center; width: 150px; align-items: center;">Hết hàng</div>
                        <?php } // end if 
                        ?>    
                <!-- Sale badge-->
                    <?php if ($m["giaban"] < $m["giagoc"]) { ?>
                        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                    <?php } // end if 
                    ?>
                    <!-- Product image-->
                    <a href="index.php?action=detail&danhmuc_id=<?php echo $m["danhmuc_id"]; ?>&id=<?php echo $m["id"]; ?>">
                        <img class="card-img-top" src="../img/sanpham/<?php echo $tendm; ?>/<?php echo $m["hinhanh"]; ?>" 
                        alt="<?php echo $m["tenmh"]; ?>" style="height: 300px;"/>
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <a class="text-decoration-none" href="index.php?action=detail&danhmuc_id=<?php echo $m["danhmuc_id"]; ?>&id=<?php echo $m["id"]; ?>">
                                <h5 class="fw-bolder text-info"><?php echo $m["tenmh"]; ?></h5>
                            </a>
                            <!-- Product reviews-->
                            
                            <!-- Product price-->
                            <?php if ($m["giaban"] < $m["giagoc"]) { ?>
                                <span class="text-muted text-decoration-line-through"><?php echo number_format($m["giagoc"]); ?>đ</span><?php } // end if 
                                                                                                                                        ?>
                            <span class="text-danger fw-bolder"><?php echo number_format($m["giaban"]); ?>đ</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&danhmuc_id=<?php echo $m["danhmuc_id"]; ?>&id=<?php echo $m["id"]; ?>&soluong=1">Chọn mua</a></div>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    } else {
        echo "<p>Loại sản phẩm này hiện chưa có. Vui lòng xem phân loại khác...</p>";
    }
    ?>
</div>
<!-- Hiển thị phân trang -->
<div class="pagination justify-content-center" style="margin:20px 0">
<li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a></li>
	<?php for ($i = 1; $i <= $totalPages; $i++) : ?>
		<?php if ($i == $currentPage) : ?>
        <li class="page-item"><a class="page-link" href="#"><?php echo $i; ?></a></li>
		<?php else : ?>
			<a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>	
		<?php endif; ?>
	<?php endfor; ?>
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a></li>

</div>

<?php include("include/bottom.php"); ?>