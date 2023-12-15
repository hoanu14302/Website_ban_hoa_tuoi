<?php include("include/top.php"); ?>

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
                    <a href="index.php?action=detail&danhmuc=<?php echo $tendm; ?>&id=<?php echo $m["id"]; ?>">
                        <img class="card-img-top" src="../img/hoa/<?php echo $tendm; ?>/<?php echo $m["hinhanh"]; ?>" 
                        alt="<?php echo $m["tenmh"]; ?>" style="height: 300px;"/>
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <a class="text-decoration-none" href="index.php?action=detail&danhmuc=<?php echo $tendm; ?>&id=<?php echo $m["id"]; ?>">
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
                        <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&danhmuc=<?php echo $tendm; ?>&id=<?php echo $m["id"]; ?>&soluong=1">Chọn mua</a></div>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    } else {
        echo "<p>Loại hoa này hiện chưa có sản phẩm. Vui lòng xem phân loại khác...</p>";
    }
    ?>
</div>
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a></li>
</ul>

<?php include("include/bottom.php"); ?>