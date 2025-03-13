<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $emp_id = $_POST['emp_id']; // รหัสนักงาน
    $position = $_POST['position']; // ตำแหน่ง
    $email = $_POST['email'];
    $phone = $_POST['phone']; // เบอร์โทรศัพท์
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, emp_id, position, email, phone, password)
            VALUES ('$name', '$emp_id', '$position', '$email', '$phone', '$password')";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มผู้ใช้</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="text-center">เพิ่มผู้ใช้</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">ชื่อ</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">รหัสนักงาน</label>
            <input type="text" name="emp_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ตำแหน่ง</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">อีเมล</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">เบอร์โทรศัพท์</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="index.php" class="btn btn-secondary">ยกเลิก</a>
    </form>

</body>

</html>
