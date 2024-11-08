<?php
include './connect.php';
if (!empty($_POST)) {
    try {
        $sql = "UPDATE tbl_Khachhang SET Hoten = ?, Email = ?, SoDT = ?, Diachi = ? WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);

        $MaKH = $_POST["MaKH"];
        $Hoten = $_POST["Hoten"];
        $Email = $_POST["Email"];
        $SoDT = $_POST["SoDT"];
        $Diachi = $_POST["Diachi"];

        $stmt->bind_param("sssss", $Hoten, $Email, $SoDT, $Diachi, $MaKH);

        if ($stmt->execute()) {
            ?>
            <script>
                window.location.href = `index.php?code=0`; 
            </script>
            <?php
        }
    } catch (Throwable $th) {
        ?>
        <script>
            window.location.href = `index.php?code=1`; 
        </script>
        <?php
    }
}
?>