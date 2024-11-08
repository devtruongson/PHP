<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Cầu Thủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
</head>

<body class="bg-gray-100 py-12 flex justify-center items-center px-4 flex-col">
    <div class='container mx-auto mt-8'>
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center mb-6">Thêm Khách Hàng - Quản Lý Cầu Thủ</h2>
            <form method="POST" action="">
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Ma">
                            Mã KH
                        </label>
                        <input required
                            class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                            type="text" id="Ma" name="MaKH" placeholder="Nhập Mã Khách Hàng... ">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="TenKH">
                            Tên KH
                        </label>
                        <input required
                            class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                            type="text" id="Hoten" name="Hoten" placeholder="Nhập Tên Khách Hàng... ">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Email">
                            Email Khách Hàng
                        </label>
                        <input required
                            class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                            type="email" id="Email" name="Email" placeholder="Nhập Email Khách Hàng... ">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="SoDT">
                            Số Điện Thoại KH
                        </label>
                        <input
                            class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                            type="text" id="SoDT" name="SoDT" placeholder="Nhập SoDT Khách Hàng... ">
                    </div>
                    <div class="mb-4 col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="SoDT">
                            Số Điện Thoại KH
                        </label>
                        <textarea required minlength="4"
                            class="w-full px-3 min-h-[300px] py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                            type="text" id="Diachi" name="Diachi" placeholder="Nhập Diachi Khách Hàng... "></textarea>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="flex items-center gap-6 justify-center max-w-[30%] ml-auto">
                        <button
                            class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300"
                            type="submit">
                            Thêm
                        </button>
                        <button
                            class="w-full bg-yellow-700 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300"
                            type="reset">
                            Clear
                        </button>
                        <a href="index.php"
                            class="inline-block text-center w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300"
                            type="submit">
                            Thoát
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include './connect.php';
    if (!empty($_POST)) {
        try {
            $sql = "INSERT INTO tbl_Khachhang (MaKH, Hoten, Email, SoDT, Diachi) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $MaKH = $_POST["MaKH"];
            $Hoten = $_POST["Hoten"];
            $Email = $_POST["Email"];
            $SoDT = $_POST["SoDT"];
            $Diachi = $_POST["Diachi"];

            $stmt->bind_param("sssss", $MaKH, $Hoten, $Email, $SoDT, $Diachi);

            if ($stmt->execute()) {
                ?>
                <script>
                    Swal.fire({
                        title: "Chúc Mừng",
                        text: "Bạn đã thêm thành công khách hàng!",
                        icon: "success",
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = window.location.href;
                        }
                    });
                </script>
                <?php
            }
        } catch (\Throwable $th) {
            ?>
            <script>
                Swal.fire({
                    title: "Có Lỗi",
                    text: "Mã Khách Hàng Bạn Thêm Đã Tồn Tại!",
                    icon: "info",
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = window.location.href;
                    }
                });
            </script>
            <?php
        }
    }
    ?>
</body>

</html>