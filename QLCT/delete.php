<?php
include './connect.php';

if (!empty($_POST)) {
    try {
        $MaKH = $_POST["MaKH"];

        $stmt = $conn->prepare("DELETE FROM tbl_Khachhang WHERE MaKH = ?");
        $stmt->bind_param("s", $MaKH);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                ?>
                <script>
                    window.location.href = `index.php?code=0`; 
                </script>
                <?php
            }
        }

        $stmt->close();
    } catch (Throwable $th) {
        ?>
        <script>
            window.location.href = `index.php?code=1`; 
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location.href = `index.php?code=1`; 
    </script>
    <?php
}
?>