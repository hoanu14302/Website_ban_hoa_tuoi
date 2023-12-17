<?php include("../include/top.php"); ?>

<div class="row">
    <div class="col-sm-9">

        <table class="table table-hover">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên mặt hàng</th>
                <th>Gía bán</th>
                <th>Số lượng</th>
            </tr>
            <?php
            foreach ($donhangct as $ct) :
                foreach ($mathang as $m) :
                    if ( $ct["donhang_id"] == $donhanghh["id"] && $ct["mathang_id"] == $m["id"]) { ?>
                            <tr>
                                <td>
                                    <img width="40px" class="thumnail" src="../../img/giohang/<?php echo $m["hinhanh"]; ?>
">
                                </td>
                                <td><?php echo $m["tenmh"]; ?></td>
                                <td><?php echo number_format($m["giaban"]); ?></td>
                                <td><?php echo $ct["soluong"]; ?></td>

                            </tr>
            <?php }
                endforeach;
            endforeach; ?>
        </table>


    </div>
</div>



<?php include("../include/bottom.php"); ?>