<?php
include_once 'db.php';
class UserModel
{
  //lay tat ca
  public function all()
  {
    global $conn;
    $sql = "SELECT * FROM user";
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
    $sql = "SELECT * FROM user WHERE id = $id";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $rows = $stmt->fetch();
    return $rows;
  }

  //lay 1 ket qua theo id
  public function find($id)
  {
    global $conn;
    $sql = "SELECT * FROM c10_khach_hang WHERE id = $id";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $row = $stmt->fetch();
    return $row;
  }

  //them moi du lieu
  public function create($data)
  {
    global $conn;
    $name = $data['user_name'];
    $phone = $data['phone'];
    $address = $data['address'];
    $email = $data['email'];
    $password = $data['password'];

    $sql = " INSERT INTO user ( user_name,phone,address,email,password ) VALUES 
            ( '$name','$phone','$address','$email','$password' )";
    $conn->query($sql);
  }

  //cap nhat du lieu
  public function update($id, $data)
  {
    global $conn;
    $sql = "UPDATE user SET 
            `user_name` = '" . $_POST['name'] . "',
            `phone` = '" . $_POST['phone'] . "',
            `address` = '" . $_POST['address'] . "',
            `email` = '" . $_POST['email'] . "'
            WHERE `id` = $id";
    // print_r($sql);
    // die();
    $conn->exec($sql);
  }


  //xoa 1 du lieu
  public function delete($id)
  {
    global $conn;
    $sql = "DELETE FROM user WHERE id = $id";
    $conn->exec($sql);
  }
  public function sigin($email, $password)
  {
    global $conn;
    $message = "dang nhap khong thanh cong";
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
  public function totalProducts()
  {
    global $conn;
    $sql = "SELECT sum(quantity) FROM products";
    $stmt = $conn->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $rows = $stmt->fetch();
    // echo "<pre>";
    // print_r($rows);die();
    return $rows;
  }
  public function totalMoney()
  {
    global $conn;
    $sql = "SELECT sum(total_order) FROM orders";
    $stmt = $conn->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $rows = $stmt->fetch();
    // echo "<pre>";
    // print_r($rows);die();
    return $rows;
  }
  public function totalOrders()
  {
    global $conn;
    $sql = "SELECT count(id) FROM orders";
    $stmt = $conn->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $rows = $stmt->fetch();
    // echo "<pre>";
    // print_r($rows);die();
    return $rows;
  }
  public function totalCustomers()
  {
    global $conn;
    $sql = "SELECT count(id) FROM customers";
    $stmt = $conn->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $rows = $stmt->fetch();
    // echo "<pre>";
    // print_r($rows);die();
    return $rows;
  }
}
