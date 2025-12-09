@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-3xl font-bold mb-6">Saldo Toko</h1>

    <!-- Saldo Toko Saat Ini -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-lg font-medium text-gray-900">Saldo Toko Saat Ini</h3>
        <p class="text-xl font-semibold text-gray-800">Rp {{ number_format($store->balance->current_balance, 2, ',', '.') }}</p>
    </div>

    <!-- Riwayat Saldo -->
    <h2 class="text-xl font-semibold mb-4">Riwayat Saldo</h2>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($store->balance->transactions as $transaction)
                    <tr>
                        <td class="px-4 py-2">{{ $transaction->created_at->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">{{ $transaction->description }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
