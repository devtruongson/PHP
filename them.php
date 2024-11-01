<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thuốc</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold mb-4">Thêm Thuốc</h2>
        <form action="them_thuoc.php" method="POST">
            <div class="mb-4">
                <label for="ten" class="block text-sm font-medium text-gray-700">Tên</label>
                <input type="text" id="ten" name="ten" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="donvi" class="block text-sm font-medium text-gray-700">Đơn Vị</label>
                <input type="text" id="donvi" name="donvi" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="giaban" class="block text-sm font-medium text-gray-700">Giá Bán</label>
                <input type="number" id="giaban" name="giaban" step="0.01" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="hansd" class="block text-sm font-medium text-gray-700">Hạn Sử Dụng</label>
                <input type="date" id="hansd" name="hansd" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Thêm Thuốc</button>
        </form>
    </div>
</body>
</html>
