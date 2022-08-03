<?php
include "../../models/db.php";
class CartModel
{
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
}