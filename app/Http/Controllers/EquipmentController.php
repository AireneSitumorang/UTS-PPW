<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UTS-PPW</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-blue-900 text-white p-4 flex justify-between">
        <a href="/equipments" class="font-bold">DEL-LEATS</a>
        <div class="space-x-4 text-sm">
            <a href="/equipments">Katalog</a>
            <a href="/equipments/create">Tambah Aset</a>
            <a href="/loans/create">Pinjam</a>
        </div>
    </nav>
    <div class="container mx-auto p-6 flex-grow">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 mb-4 rounded text-sm">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>