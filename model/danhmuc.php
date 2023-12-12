<?php
class DANHMUC{
    private $id;
    private $tendm;

    public function getid(){
        return $this->id;
    }

    public function setid($value){
        $this->id = $value;
    }

    public function gettendm(){
        return $this->tendm;
    }

    public function settendm($value){
        $this->tendm = $value;
    }

    // Lấy danh sách
    public function laydanhmuc(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhmuc";
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


    // Lấy danh mục theo id
    public function laydanhmuctheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhmuc WHERE id=:id";
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
    // Thêm mới
    public function themdanhmuc($danhmuc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO danhmuc(tendm) VALUES(:tendm)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendm", $danhmuc->tendm);
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
    public function xoadanhmuc($danhmuc){
    $dbcon = DATABASE::connect();
    try{
    $sql = "DELETE FROM danhmuc WHERE id=:id";
    $cmd = $dbcon->prepare($sql);
    $cmd->bindValue(":id", $danhmuc->id);
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
    public function suadanhmuc ($danhmuc){
    $dbcon = DATABASE::connect();
    try{
    $sql = "UPDATE danhmuc SET tendm=:tendm WHERE id=:id";
    $cmd = $dbcon->prepare($sql);
    $cmd->bindValue(":tendm", $danhmuc->tendm);
    $cmd->bindValue(":id", $danhmuc->id);
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
