<?php
include "../../models/db.php";
class ShowModel
{
    public function all(){
        global $conn;
        $sql = "SELECT * FROM products";
        $stmt = $conn->query($sql);
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        //fetchALL se tra ve du lieu nhieu hon 1 ket qua
        $rows = $stmt->fetchAll();
        // echo "<pre>";
        // print_r($sql);die();
        return $rows;
    }
    public function getOne($id)
    {
      global $conn;
      $sql = "SELECT * FROM `categories` WHERE id = '$id'";
      $stmt = $conn->query($sql);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $rows = $stmt->fetch();
    //   print_r($rows);
      return $rows;
    }

    //lay 1 ket qua theo id
    public function find($id){
        global $conn;
        $sql = "SELECT * FROM c10_khach_hang WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $row = $stmt->fetch();
        return $row;
    }

  

 public function sigin($email,$password){
    global $conn;
    $message="dang nhap khong thanh cong";
    $sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password'"; //truy vấn vào database
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_OBJ);
    $rows = $query->fetch();
    if (isset($rows)) {
      return $rows;
    } else {
      return $message;
    }
}
public function search($search){
  global $conn;
  $sql = "SELECT * FROM categories WHERE name LIKE '%$search%' OR id LIKE '%$search%'";
  $stmt = $conn->query($sql);
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  $rows = $stmt->fetchAll();
  // echo '<pre>';
  // print_r($rows);
  // die();
  return $rows;

}
}