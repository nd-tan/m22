<?php
    include_once 'db.php';
    class ProductModel {
        //lay tat ca
        public function all(){
            global $conn;
            $sql = "SELECT products.*,categories.name as categoryName FROM products join categories on products.categories_id = categories.id ORDER BY id DESC";
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
          $sql = "SELECT * FROM `products` WHERE id = '$id'";
          $stmt = $conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $rows = $stmt->fetch();
        //   print_r($rows);
          return $rows;
        }

        //lay 1 ket qua theo id
        public function find($id){
            global $conn;
            $sql = "SELECT products.*,categories.name as categoryname FROM  products join categories on products.categories_id = categories.id WHERE products.id='$id'";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $row = $stmt->fetch();
            return $row;
        }

        //them moi du lieu
        public function create( $data ){
            global $conn;
            $name = $data['name'];
            $age = $data['age'];
            $color = $data['color'];
            $breed = $data['breed'];
            $price = $data['price'];
            $image = $data['image'];
            $gender = $data['gender'];

            $sql = " INSERT INTO products ( name,age,color,categories_id,price,image,gender) VALUES 
            ('$name','$age','$color','$breed','$price','$image','$gender')";
            $conn->query($sql);
        }

        //cap nhat du lieu
        public function update($id, $data){
            global $conn;
            $sql = "UPDATE products SET 
            name = '" . $_POST['name'] . "',
            age = '" . $_POST['age'] . "',
            color = '" . $_POST['color'] . "',
            categories_id = '" . $_POST['breed'] . "',
            price = '" . $_POST['price'] . "',
            image = '" . $_POST['img'] . "',
            gender = '" . $_POST['gender'] . "'
            WHERE id = $id";
            // print_r($sql);
            // die();
            $conn->exec($sql);
        }
        

        //xoa 1 du lieu
        public function delete($id){
            global $conn;
            $sql = "DELETE FROM products WHERE id = '$id'";
            $conn->exec($sql);
    } 
    public function search($search){
        global $conn;
        $sql = "SELECT products.*,categories.name as categoryName FROM products join categories on products.categories_id = categories.id 
        WHERE categories.name LIKE '%$search%'  OR products.name like '%$search%'  OR products.gender like '%$search%' OR products.age like '%$search%' OR products.color like '%$search%' OR products.price like '%$search%' OR products.id like '%$search%'";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        // echo '<pre>';
        // print_r($search);
        // die();
        
        return $rows;
  
      }

    
}