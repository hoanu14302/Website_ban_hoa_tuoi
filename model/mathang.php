<?php
class MATHANG{
    // khai báo các thuộc tính
    private $id;
    private $tenmathang;
    private $mota;
    private $giagoc;
    private $giaban;
    private $soluongton;
    private $hinhanh;
    private $danhmucid;
    private $luotxem;
    private $luotmua;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function gettenmathang(){ return $this->tenmathang; }
    public function settenmathang($value){ $this->tenmathang = $value; }
    public function getmota(){ return $this->mota; }
    public function setmota($value){ $this->mota = $value; }
    public function getgiagoc(){ return $this->giagoc; }
    public function setgiagoc($value){ $this->giagoc = $value; }
    public function getgiaban(){ return $this->giaban; }
    public function setgiaban($value){ $this->giaban = $value; }
    public function getsoluongton(){ return $this->soluongton; }
    public function setsoluongton($value){ $this->soluongton = $value; }
    public function gethinhanh(){ return $this->hinhanh; }
    public function sethinhanh($value){ $this->hinhanh = $value; }
    public function getdanhmuc_id(){ return $this->danhmuc_id; }
    public function setdanhmuc_id($value){ $this->danhmuc_id = $value; }
    public function getluotxem(){ return $this->luotxem; }
    public function setluotxem($value){ $this->luotxem = $value; }
    public function getluotmua(){ return $this->luotmua; }
    public function setluotmua($value){ $this->luotmua = $value; }


    // Lấy danh sách
    public function laymathang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	// Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laymathangtheodanhmuc($danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:madm" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madm",$danhmuc_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laymathangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy mặt hàng xem nhiều
    public function laymathangxemnhieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang ORDER BY luotxem DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Thêm mới
    public function themmathang($mathang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO mathang(tenmathang,mota,giagoc,giaban,soluongton,danhmuc_id,hinhanh,luotxem,luotmua) 
                VALUES(:tenmathang,:mota,:giagoc,:giaban,:soluongton,:danhmuc_id,:hinhanh,0,0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $mathang->tenmathang);
            $cmd->bindValue(":mota", $mathang->mota);
            $cmd->bindValue(":giagoc", $mathang->giagoc);
            $cmd->bindValue(":giaban", $mathang->giaban);
            $cmd->bindValue(":soluongton", $mathang->soluongton);
            $cmd->bindValue(":danhmuc_id", $mathang->danhmuc_id);
            $cmd->bindValue(":hinhanh", $mathang->hinhanh);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoamathang($mathang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $mathang->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suamathang($mathang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET tenmathang=:tenmathang,
                                        mota=:mota,
                                        giagoc=:giagoc,
                                        giaban=:giaban,
                                        soluongton=:soluongton,
                                        danhmuc_id=:danhmuc_id,
                                        hinhanh=:hinhanh,
                                        luotxem=:luotxem,
                                        luotmua=:luotmua
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $mathang->tenmathang);
            $cmd->bindValue(":mota", $mathang->mota);
            $cmd->bindValue(":giagoc", $mathang->giagoc);
            $cmd->bindValue(":giaban", $mathang->giaban);
            $cmd->bindValue(":soluongton", $mathang->soluongton);
            $cmd->bindValue(":danhmuc_id", $mathang->danhmuc_id);
            $cmd->bindValue(":hinhanh", $mathang->hinhanh);
            $cmd->bindValue(":luotxem", $mathang->luotxem);
            $cmd->bindValue(":luotmua", $mathang->luotmua);
            $cmd->bindValue(":id", $mathang->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

}
?>
