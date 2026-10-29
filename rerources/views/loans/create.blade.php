@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-lg font-bold mb-4">Form Peminjaman</h1>
    @if($errors->any())<div class="bg-red-100 text-red-700 p-2 mb-3 rounded text-xs">Periksa kembali form Anda.</div>@endif
    <form action="/loans" method="POST" class="space-y-3 text-sm">
        @csrf
        <select name="equipment_id" class="w-full border p-2 rounded">
            @foreach($equipments as $eq)<option value="{{ $eq->id }}" {{ request('equipment_id') == $eq->id ? 'selected' : '' }}>{{ $eq->name }}</option>@endforeach
        </select>
        <input type="text" name="borrower_name" placeholder="Nama" class="w-full border p-2 rounded">
        <input type="text" name="borrower_nim" placeholder="NIM" class="w-full border p-2 rounded">
        <input type="email" name="borrower_email" placeholder="Email" class="w-full border p-2 rounded">
        <input type="date" name="loan_date" class="w-full border p-2 rounded">
        <input type="date" name="expected_return_date" class="w-full border p-2 rounded">
        <textarea name="purpose" placeholder="Tujuan" class="w-full border p-2 rounded"></textarea>
        <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded">Ajukan</button>
    </form>
</div>
@endsection