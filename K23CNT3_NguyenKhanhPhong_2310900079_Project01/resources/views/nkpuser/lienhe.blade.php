
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Liên Hệ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-4">Form Liên Hệ</h1>

        <!-- Form Liên Hệ -->
        <form action="mailto:your_email@example.com" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-lg">
            <!-- Họ và tên -->
            <div class="mb-4">
                <label for="name" class="block text-lg">Họ và tên</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <!-- Chủ đề -->
            <div class="mb-4">
                <label for="subject" class="block text-lg">Chủ đề</label>
                <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <!-- Tin nhắn -->
            <div class="mb-4">
                <label for="message" class="block text-lg">Tin nhắn</label>
                <textarea name="message" id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded" required></textarea>
            </div>

            <!-- Nút Gửi -->
            <div class="mb-4 text-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">Gửi</button>
            </div>
        </form>
    </div>

</body>
</html>
