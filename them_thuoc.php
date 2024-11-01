<?php
include "./model/thuoc.model.php";

$ten = $_POST['ten'];
$donvi = $_POST['donvi'];
$giaban = $_POST['giaban'];
$hansd = $_POST['hansd'];

$sql = "INSERT INTO Thuoc (Ten, DonVi, GiaBan, HanSD) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $ten, $donvi, $giaban, $hansd);

if ($stmt->execute()) {
    echo "Thêm thuốc thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
