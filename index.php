<?php
    include "./model/thuoc.model.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='bg-gray-100 text-gray-800 px-6'>
        <div class='container mx-auto mt-8'>
            <h2 class="text-2xl font-bold mb-4">Danh sách Thuốc</h2>
            <a href="./them.php" class="inline-flex mb-10 items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 btn-add-to-cart">Thêm Thuốc</a>
            <table class="min-w-full bg-white border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">STT</th>
                        <th class="py-2 px-4 border">Mã</th>
                        <th class="py-2 px-4 border">Tên</th>
                        <th class="py-2 px-4 border">Đơn Vị Tính</th>
                        <th class="py-2 px-4 border">Giá Bán</th>
                        <th class="py-2 px-4 border">Hạn Sử Dụng</th>
                        <th class="py-2 px-4 border">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM Thuoc";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td class="py-2 px-4 border text-center"><?php echo $i++; ?></td>
                                    <td class="py-2 px-4 border"><?php echo $row['Ma']; ?></td>
                                    <td class="py-2 px-4 border"><?php echo $row['Ten']; ?></td>
                                    <td class="py-2 px-4 border"><?php echo $row['DonVi']; ?></td>
                                    <td class="py-2 px-4 border"><?php echo $row['GiaBan']; ?></td>
                                    <td class="py-2 px-4 border"><?php echo $row['HanSD']; ?></td>
                                    <td class="py-2 px-4 border">
                                        <button data-product='<?php echo json_encode($row); ?>' type="button" class="inline-flex w-full items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 btn-add-to-cart">
                                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                            </svg>
                                            Add to cart
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <a href="./cart.php" id="btn_cart_page" class="fixed bottom-[30px] right-[50px] p-3 shadown-md  rounded-[50%] bg-[#ddd]">
            <span class="absolute bg-[red] text-[#fff] top-[-10px] rounded-[20px] px-3" id="count-cart"></span>
            <img class="w-[50px] h-[50px]" src="https://cdn-icons-png.freepik.com/512/7835/7835563.png" alt="">
        </a>
        <script src="./js/main.js"></script>
    </body>
</html>