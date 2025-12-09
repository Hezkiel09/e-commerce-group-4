@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Produk</h1>

    <a href="{{ route('seller.products.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md mb-4 inline-block">Tambah Produk</a>

    <!-- Daftar Produk -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="px-4 py-2">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" class="w-20 h-20 object-cover" alt="{{ $product->name }}">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2">{{ $product->category->name }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $product->stock }}</td>
                        <td class="px-4 py-2">{{ $product->status }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="text-blue-500">Edit</a> |
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
