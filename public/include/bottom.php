</div>
</section>

<!-- Top products -->

<section>
  <div class="container-fluid">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-md-12">
        <?php include("include/carousel.php"); ?>
      </div>
<!-- 
      <div class="col-md-6 pt-2">
        Nav tabs
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#menu1">Nổi bật</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu2">Xem nhiều</a>
          </li>
        </ul>

        Tab panes
        <div class="tab-content">
          <div id="menu1" class="container tab-pane active"><br>

            <?php include("include/topview.php"); ?>

          </div>
          <div id="menu2" class="container tab-pane fade"><br>
          <?php include("include/topbuy.php"); ?>

          </div>
        </div>
      </div>
       -->
    </div>
  </div>
</section>

<!-- Footer-->
<footer class="py-5" style="background-color:white;">
  <div class="text-center mb-5"><a class="text-warning" href="#top"><i class="bi bi-chevron-up" style="font-size: 3rem; font-weight: bold; color:#3b5d50;"></i></a></div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <a href="index.php" class="text-decoration-none" style="color: #3b5d50;">
          <h4>Elko Garden - Cửa hàng hoa tươi
          </h4>
        </a>
        <p class="text-decoration-none">
          <b><i>Địa chỉ:</i></b> 18 Ung Văn Khiêm, phường Đông Xuyên, TP Long Xuyên, An Giang<br>
          <b><i>Điện thoại:</i></b> 076 384 1190<br>
          <b><i>Email:</i></b> elkogarden@elko.com
        </p>
      </div>
      <div class="col-md-3">
        <h4>DANH MỤC</h4>
        <?php foreach ($danhmuc as $d) : ?>
          <a class="list-group-item" href="?action=group&id=<?php echo $d["id"]; ?>">
            <?php echo $d["tendm"]; ?>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="col-md-3">
        <h4>DỊCH VỤ KHÁCH HÀNG</h4>
        <a href="#" class="list-group-item">Hướng dẫn mua hàng</a>
        <a href="#" class="list-group-item">Câu hỏi thường gặp</a>
        <a href="#" class="list-group-item">Liên hệ với chúng tôi</a>
      </div>
    </div>
    <hr>
    <p class="m-0 text-center fw-bolder">Copyright &copy; Elko Garden 2023</p>
  </div>
</footer>

</body>

</html>