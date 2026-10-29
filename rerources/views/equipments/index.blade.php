@extends('layouts.app')
@section('content')
<h1 class="text-xl font-bold mb-4">Katalog Aset</h1>

<form method="GET" class="mb-6 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." class="border p-2 rounded text-sm">
    
    <!-- Bagian ini akan error Undefined variable $categories jika Error 3 belum diperbaiki -->
    <select name="category_id" class="border p-2 rounded text-sm">
        <option value="">Semua Kategori</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Cari</button>
</form>

<div class="grid grid-cols-3 gap-4">
    @foreach($equipments as $item)
    <div class="bg-white p-4 rounded shadow">
        @if($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}" class="h-32 w-full object-cover mb-2 rounded">
        @endif
        <h3 class="font-bold">{{ $item->name }}</h3>
        <p class="text-sm text-gray-600">{{ $item->asset_code }}</p>
        <span class="px-2 py-1 text-xs rounded {{ $item->status == 'tersedia' ? 'bg-green-200' : 'bg-yellow-200' }}">{{ $item->status }}</span>
        @if($item->status == 'tersedia')
            <a href="/loans/create?equipment_id={{ $item->id }}" class="block mt-3 bg-blue-600 text-white text-center py-1 rounded text-xs">Pinjam</a>
        @endif
    </div>
    @endforeach
</div>

<div class="mt-4">{{ $equipments->appends(request()->query())->links() }}</div>
@endsection