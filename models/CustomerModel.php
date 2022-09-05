<?php
include_once 'db.php';
class CustomerModel
{
    //lay tat ca
    public function all()
    {
        global $conn;
        $sql = "SELECT * FROM customers";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public function search($search)
    {
        global $conn;
        $sql = "SELECT * FROM customers WHERE name LIKE '%$search%' OR id LIKE '%$search%' OR address LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public function destroy($id)
    {
        global $conn;
        $sql = "DELETE FROM customers WHERE id = '$id'";
        $conn->exec($sql);
    }
}
