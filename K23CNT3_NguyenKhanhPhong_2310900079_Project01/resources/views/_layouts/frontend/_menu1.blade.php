<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khanhphong</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-gradient-to-r from-blue-500 to-purple-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">LAPTOPSTORE</h1>
            <ul class="flex space-x-4 text-white">
               
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300" href="{{ route('nkpuser.search1', ['search' => 'Asus']) }}">Asus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300" href="{{ route('nkpuser.search1', ['search' => 'Lenovo']) }}">Lenovo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300" href="{{ route('nkpuser.search1', ['search' => 'Dell']) }}">Dell</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300" href="{{route('nkpuser.lienhe')}}">Liên Hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-300" href="{{route('nkpuser.gioithieu')}}">Giới Thiệu</a>
                </li>
            
            </ul>
        </div>
    </nav>
</body>
</html>