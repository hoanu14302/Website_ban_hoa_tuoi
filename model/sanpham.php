<?php
class SANPHAM
{
    // khai báo các thuộc tính
    private $id;
    private $tensp;
    private $danhmucsp;
    private $mota;
    private $giagoc;
    private $giaban;
    private $soluongton;
    private $hinhanh;
    private $luotxem;
    private $luotmua;

    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function gettensp()
    {
        return $this->tensp;
    }
    public function settensp($value)
    {
        $this->tensp = $value;
    }
    public function getmota()
    {
        return $this->mota;
    }
    public function setmota($value)
    {
        $this->mota = $value;
    }
    public function getgiagoc()
    {
        return $this->giagoc;
    }
    public function setgiagoc($value)
    {
        $this->giagoc = $value;
    }
    public function getgiaban()
    {
        return $this->giaban;
    }
    public function setgiaban($value)
    {
        $this->giaban = $value;
    }
    public function getsoluongton()
    {
        return $this->soluongton;
    }
    public function setsoluongton($value)
    {
        $this->soluongton = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function getdanhmucsp()
    {
        return $this->danhmucsp;
    }
    public function setdanhmucsp($value)
    {
        $this->danhmucsp = $value;
    }
    public function getluotxem()
    {
        return $this->luotxem;
    }
    public function setluotxem($value)
    {
        $this->luotxem = $value;
    }
    public function getluotmua()
    {
        return $this->luotmua;
    }
    public function setluotmua($value)
    {
        $this->luotmua = $value;
    }


    // Lấy danh sách
    public function laysanpham()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham ORDER BY id DESC ";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Tìm kiếm 
    public function timkiemsanpham($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham s, danhmuc p where s.danhmucsp = p.id AND  s.tensp like '%$search%'  "; //OR p.tenpl like '%$search%'
            $cmd = $dbcon->prepare($sql);
           // $cmd->bindValue(":tensp", $search);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laysanphamtheodanhmuc($danhmucsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE danhmucsp=:madm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $danhmucsp);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laysanphamtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật số lượng
    public function giamsoluong($id, $soluongmua)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET soluongton=soluongton-:soluongmua WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluongmua", $soluongmua);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng xem nhiều
    public function laysanphamxemnhieu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function themsanpham($sanpham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
sanpham(tensp,danhmucsp,mota,giagoc,giaban,soluongton,hinhanh,luotxem,luotmua) 
VALUES(:tensp,:danhmucsp,:mota,:giagoc,:giaban,:soluongton,:hinhanh,0,0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tensp", $sanpham->tensp);
            $cmd->bindValue(":danhmucsp", $sanpham->danhmucsp);
            $cmd->bindValue(":mota", $sanpham->mota);
            $cmd->bindValue(":giagoc", $sanpham->giagoc);
            $cmd->bindValue(":giaban", $sanpham->giaban);
            $cmd->bindValue(":soluongton", $sanpham->soluongton);
            $cmd->bindValue(":hinhanh", $sanpham->hinhanh);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoasanpham($sanpham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM sanpham WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $sanpham->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suasanpham($sanpham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET tensp=:tensp,
            danhmucsp=:danhmucsp,
            mota=:mota,
            giagoc=:giagoc,
            giaban=:giaban,
            soluongton=:soluongton,
            hinhanh=:hinhanh,
            luotxem=:luotxem,
            luotmua=:luotmua
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tensp", $sanpham->tensp);
            $cmd->bindValue(":mota", $sanpham->mota);
            $cmd->bindValue(":giagoc", $sanpham->giagoc);
            $cmd->bindValue(":giaban", $sanpham->giaban);
            $cmd->bindValue(":soluongton", $sanpham->soluongton);
            $cmd->bindValue(":danhmucsp", $sanpham->danhmucsp);
            $cmd->bindValue(":hinhanh", $sanpham->hinhanh);
            $cmd->bindValue(":luotxem", $sanpham->luotxem);
            $cmd->bindValue(":luotmua", $sanpham->luotmua);
            $cmd->bindValue(":id", $sanpham->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
