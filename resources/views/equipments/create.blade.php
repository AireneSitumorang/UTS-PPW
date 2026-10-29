@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-lg font-bold mb-4">Tambah Aset Baru</h1>
    <form action="/equipments" method="POST" enctype="multipart/form-data" class="space-y-3 text-sm">
        @csrf
        <select name="category_id" class="w-full border p-2 rounded">
            @foreach($categories as $cat)<option value="{{ $cat->id }}">{{ $cat->name }}</option>@endforeach
        </select>
        <input type="text" name="asset_code" placeholder="Kode Aset" class="w-full border p-2 rounded">
        <input type="text" name="name" placeholder="Nama Perangkat" class="w-full border p-2 rounded">
        <textarea name="specification" placeholder="Spesifikasi" class="w-full border p-2 rounded"></textarea>
        <input type="number" name="daily_rental_fee" placeholder="Tarif Harian" class="w-full border p-2 rounded">
        <input type="file" name="image" class="w-full">
        <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded">Simpan</button>
    </form>
</div>
@endsection