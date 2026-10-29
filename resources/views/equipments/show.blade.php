@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-2">{{ $equipment->name }}</h1>
    <p class="text-gray-600 mb-4">{{ $equipment->asset_code }}</p>
    @if($equipment->image_path)
        <img src="{{ asset('storage/' . $equipment->image_path) }}" class="h-64 w-full object-cover mb-4 rounded">
    @endif
    <p><strong>Tarif:</strong> Rp {{ number_format($equipment->daily_rental_fee) }}</p>
    <p class="mt-4"><strong>Spesifikasi:</strong></p>
    <p class="bg-gray-50 p-3 rounded mb-4 text-sm">{{ $equipment->specification }}</p>
    <a href="/equipments" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Kembali</a>
</div>
@endsection