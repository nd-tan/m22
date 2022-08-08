<?php
include "../../models/db.php";
class CartModel
{
  public function all(){
    global $conn;
    $sql = "SELECT * FROM customers";
    $stmt = $conn->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $rows = $stmt->fetchAll();
    // echo "<pre>";
    // print_r($rows);die();
    return $rows;
}
  public function getOne($id)
  {
    global $conn;
    $sql = "SELECT * FROM `products` WHERE id = '$id'";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $rows = $stmt->fetch();
    //   print_r($rows);
    return $rows;
  }

  public function getCustomer($id)
  {
    global $conn;
    $sql = "SELECT * FROM `customers` WHERE id = '$id'";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $rows = $stmt->fetch();
    //   print_r($rows);
    return $rows;
  }

  public function sigin($email, $password)
  {
    global $conn;
    $message = "dang nhap khong thanh cong";
    $sql = " SELECT * FROM customers WHERE email = '$email' AND password = '$password'"; //truy vấn vào database
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_OBJ);
    $rows = $query->fetch();
    if (isset($rows)) {
      return $rows;
    } else {
      return $message;
    }
  }

  public function create($data)
  {
    global $conn;
    $name = $data['name'];
    $phone = $data['phone'];
    $address = $data['address'];
    $email = $data['email'];
    $password = $data['password'];

    $sql = " INSERT INTO customers ( name,phone,address,email,password ) VALUES 
  ( '$name','$phone','$address','$email','$password' )";
    $conn->query($sql);
  }
//   public function create_order( $data ){
//     global $conn;
//     $name = $data['name'];
//     $last_name = $data['last_name'];
//     $country = $data['country'];
//     $address = $data['address'];
//     $phone = $data['phone'];
//     $email = $data['email'];
//     $gender = $data['gender'];

//     $sql = " INSERT INTO orders ( name,age,color,categories_id,price,image,gender) VALUES 
//     ('$name','$age','$color','$breed','$price','$image','$gender')";
//     $conn->query($sql);
// }

}
