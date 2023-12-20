<?php include("include/top.php"); ?>

<div class="row">
  <div class="col-sm-9">
    <h3 class="text-dark"><?php echo $mhct["tenmh"]; ?></h3>

    <div><img width="500px" src="../img/sanpham/<?php echo $tendm ?>/<?php echo $mhct["hinhanh"]; ?>"></div>

    <div>
      <h4 class="text-primary">Giá bán:
        <span class="text-danger"><?php echo number_format($mhct["giaban"]); ?> đ</span>
      </h4>
      <form method="post" class="form-inline">
        <input type="hidden" name="action" value="chovaogio">
        <input type="hidden" name="id" value="<?php echo $mhct["id"]; ?>">
        <div class="row">
          <div class="col">
            <input type="number" class="form-control" name="soluong" value="1">
          </div>
          <div class="col">
            <input type="submit" class="btn btn-primary" value="Chọn mua">
          </div>
        </div>
      </form>
    </div>

    <div>
      <h4 class="text-primary">Mô tả sản phẩm: </h4>
      <p><?php echo $mhct["mota"]; ?></p>
    </div>
    <br>
  </div>
  <div class="col-sm-3">

    <h3 class="text-warning">CÙNG DANH MỤC:</h3>
    <?php
    $count = 0; // Biến đếm số lượng
    foreach ($mathang as $m) :
      if ($m["id"] != $mhct["id"] and $count >= 2)
        break;
    ?>
      <div>
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
            <a href="?action=detail&danhmuc_id=<?php echo $m["danhmuc_id"]; ?>&id=<?php echo $m["id"]; ?>">
              <img class="card-img-top" src="../img/sanpham/<?php echo $tendm ?>/<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmh"]; ?>" />
            </a>
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <a class="text-decoration-none" href="?action=detail&danhmuc=<?php echo $m["danhmuc_id"]; ?>&id=<?php echo $m["id"]; ?>">
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
              <div class="text-center"><a class="btn btn-outline-info mt-auto" href="#">Chọn mua</a></div>
            </div>
          </div>

        </div>
      </div>
      
    <?php
      // endforeach;
      $count++; // Tăng biến đếm lên sau khi hiển thị một mặt hàng

    endforeach;

    ?>

  </div>
</div>

<h6><div class="text-end mb-2"><a class=" text-decoration-none fw-bolder" style="color:#349abb;"
          href="index.php?action=group&id=<?php echo $m["danhmuc_id"]; ?>">Xem tất cả <?php echo $tendm ?> >></a></div></h6>

<?php include("include/bottom.php"); ?>