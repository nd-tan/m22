<?php
    include_once 'db.php';
    class OrderModel {
        //lay tat ca
        public function all(){
            global $conn;
            $sql = "SELECT * FROM orders";
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
          $sql= "SELECT orders_detail.*,products.name,products.age,products.color,products.price,products.image,products.gender FROM  orders_detail join products on orders_detail.products_id = products.id WHERE orders_detail.orders_id='$id'";
        //   $sql = "SELECT * FROM `orders` WHERE id = '$id'";
          $stmt = $conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $rows = $stmt->fetchAll();
        //   print_r($rows);
          return $rows;
        }
        public function search($search){
            global $conn;
            $sql = "SELECT * FROM orders 
            WHERE orders.id LIKE '%$search%'  OR orders.name like '%$search%'  OR orders.last_name like '%$search%' 
            OR orders.address like '%$search%' OR orders.email like '%$search%' OR orders.country like '%$search%' 
            OR orders.phone like '%$search%'";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $rows = $stmt->fetchAll();
            // echo '<pre>';
            // print_r($search);
            // die();
            
            return $rows;
      
          }

//         //lay 1 ket qua theo id
//         public function find($id){
//             global $conn;
//             $sql = "SELECT * FROM c10_khach_hang WHERE id = $id";
//             $stmt = $conn->query($sql);
//             $stmt->setFetchMode(PDO::FETCH_OBJ);
//             $row = $stmt->fetch();
//             return $row;
//         }

//         //them moi du lieu
//         public function create( $data ){
//             global $conn;
//             $name = $data['name'];

//             $sql = " INSERT INTO categories ( name) VALUES 
//             ('$name')";
//             $conn->query($sql);
//         }

//         //cap nhat du lieu
//         public function update($id, $data){
//             global $conn;
//             $sql = "UPDATE categories SET 
//             name = '" . $_POST['name'] . "'
//             WHERE id = $id";
//             // print_r($sql);
//             // die();
//             $conn->exec($sql);
//         }
        

//         //xoa 1 du lieu
//         public function delete($id){
//             global $conn;
//             $sql = "DELETE FROM categories WHERE id = '$id'";
//             $conn->exec($sql);
//     } 


//      public function sigin($email,$password){
//         global $conn;
//         $message="dang nhap khong thanh cong";
//         $sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password'"; //truy vấn vào database
//         $query = $conn->query($sql);
//         $query->setFetchMode(PDO::FETCH_OBJ);
//         $rows = $query->fetch();
//         if (isset($rows)) {
//           return $rows;
//         } else {
//           return $message;
//         }
// }
}