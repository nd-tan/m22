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
  public function create_order( $data ){
    global $conn;
    $name = $data['name'];
    $last_name = $data['last_name'];
    $country = $data['country'];
    $address = $data['address'];
    $phone = $data['phone'];
    $email = $data['email'];
    $customers_id = $data['customers_id'];
    $notes = $data['notes'];
    $total_order = $data['total_order'];
    $date_add=$data['date'];

    $sql = " INSERT INTO orders ( name,last_name,address,email,country,phone,customers_id,notes,total_order,date_add) VALUES 
    ('$name','$last_name','$address','$email','$country','$phone','$customers_id','$notes','$total_order','$date_add')";
    $conn->query($sql);
}
  public function create_order_detail( $data ){
  global $conn;
  $orders_id = $data['orders_id'];
  $quantity = $data['quantity'];
  $products_id = $data['products_id'];
  $total_price = $data['total_price'];


  $sql = " INSERT INTO orders_detail ( orders_id,quantity,products_id,totalPrice) VALUES 
  ('$orders_id','$quantity','$products_id','$total_price')";
  $conn->query($sql);
}

  public function update($id, $data){
  global $conn;
  $sql = "UPDATE customers SET 
  name = '" . $_POST['name'] . "',
  address = '" . $_POST['address'] . "',
  email = '" . $_POST['email'] . "',
  phone = '" . $_POST['phone'] . "',
  last_name = '" . $_POST['last_name'] . "',
  country = '" . $_POST['country'] . "'
  WHERE id = $id";
  // print_r($sql);
  // die();
  $conn->exec($sql);
}

  public function all_orders(){
  global $conn;
  $sql = "SELECT * FROM orders";
  $stmt = $conn->query($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  //fetchALL se tra ve du lieu nhieu hon 1 ket qua
  $rows = $stmt->fetchAll();
  // echo "<pre>";
  // print_r($rows);die();
  return $rows;
}

  public function update_products($id, $data){
  global $conn;
  $sql = "UPDATE products SET 
  quantity = '" . $data . "'
  WHERE id = $id";
  // print_r($sql);
  // die();
  $conn->exec($sql);
}

  public function all_products(){
  global $conn;
  $sql = "SELECT * FROM products";
  $stmt = $conn->query($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  //fetchALL se tra ve du lieu nhieu hon 1 ket qua
  $rows = $stmt->fetchAll();
  // echo "<pre>";
  // print_r($rows);die();
  return $rows;
}
public function count_products(){
  global $conn;
  $sql = "SELECT count(name) FROM products";
  $stmt = $conn->query($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  //fetchALL se tra ve du lieu nhieu hon 1 ket qua
  $rows = $stmt->fetchAll();
  // echo "<pre>";
  // print_r($rows);die();
  return $rows;
}
public function getOrders($id)
        {
          global $conn;
          $sql= "SELECT orders_detail.*,products.name,products.age,products.color,products.price,products.image,products.gender,orders.date_add
           FROM  products join orders_detail on products.id = orders_detail.products_id 
           join orders on orders_detail.orders_id = orders.id 
           join customers on orders.customers_id= customers.id
           WHERE customers.id ='$id' ORDER BY id DESC";
        //   $sql = "SELECT * FROM `orders` WHERE id = '$id'";
          $stmt = $conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $rows = $stmt->fetchAll();
        //   print_r($rows);
          return $rows;
        }
}
