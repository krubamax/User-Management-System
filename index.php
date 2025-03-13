<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการผู้ใช้</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h2 class="text-center mb-4">ระบบจัดการผู้ใช้</h2>
    <a href="add.php" class="btn btn-success mb-3" style="font-family: 'Kanit', sans-serif; font-weight: 500; font-style: normal;">
        เพิ่มผู้ใช้
    </a>


    <table class="tbl">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
                <th>รหัสนักงาน</th>
                <th>ตำแหน่ง</th>
                <th>อีเมล</th>
                <th>เบอร์</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to get data from the database
            $sql = "SELECT * FROM users"; // Make sure you have columns like emp_id, position, phone in your 'users' table
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['emp_id']; ?></td> <!-- รหัสนักงาน -->
                    <td><?= $row['position']; ?></td> <!-- ตำแหน่ง -->
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['phone']; ?></td> <!-- เบอร์โทร -->
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจหรือไม่?')">ลบ</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


</body>

</html>
