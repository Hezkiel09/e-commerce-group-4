@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-3xl font-bold mb-6">Tambah Produk</h1>

    <form method="POST" action="{{ route('seller.products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
            <input type="text" id="name" name="name" class="mt-1 w-full border rounded-md px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
            <textarea id="description" name="description" class="mt-1 w-full border rounded-md px-3 py-2" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" id="price" name="price" class="mt-1 w-full border rounded-md px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" id="stock" name="stock" class="mt-1 w-full border rounded-md px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
            <input type="file" id="image" name="image" class="mt-1 w-full border rounded-md px-3 py-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Simpan Produk</button>
    </form>
</div>
@endsection
