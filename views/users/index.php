<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Admin</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <a href="UserController.php?action=add">Thêm</a>
        <?php foreach( $rows as  $row ): ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->user_name; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->password; ?></td>
                <td>
                    <a href="UserController.php?action=edit&id=<?php echo $row->id; ?>">Sua</a> 
                    <a href="UserController.php?action=delete&id=<?php echo $row->id; ?>">Xoa</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>