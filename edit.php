<?php include 'config.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $emp_id = $_POST['emp_id'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // อัปเดตข้อมูลในฐานข้อมูล
    $sql = "UPDATE users SET name='$name', emp_id='$emp_id', position='$position', email='$email', phone='$phone', password='$password' WHERE id=$id";
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
    <title>แก้ไขผู้ใช้</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="text-center">แก้ไขผู้ใช้</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">ชื่อ</label>
            <input type="text" name="name" class="form-control" value="<?= $row['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">รหัสนักงาน</label>
            <input type="text" name="emp_id" class="form-control" value="<?= $row['emp_id']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ตำแหน่ง</label>
            <input type="text" name="position" class="form-control" value="<?= $row['position']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">อีเมล</label>
            <input type="email" name="email" class="form-control" value="<?= $row['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">เบอร์โทรศัพท์</label>
            <input type="text" name="phone" class="form-control" value="<?= $row['phone']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">บันทึก</button>
        <a href="index.php" class="btn btn-secondary">ยกเลิก</a>
    </form>
</body>

</html>
