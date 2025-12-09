@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-3xl font-bold mb-6">Penarikan Dana</h1>

    <!-- Saldo Tersedia untuk Penarikan -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-lg font-medium text-gray-900">Saldo Tersedia</h3>
        <p class="text-xl font-semibold text-gray-800">Rp {{ number_format($store->balance->current_balance, 2, ',', '.') }}</p>
    </div>

    <!-- Form Penarikan Dana -->
    <form method="POST" action="{{ route('seller.withdrawals.store') }}">
        @csrf
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Penarikan</label>
            <input type="number" name="amount" class="mt-1 w-full border rounded-md px-3 py-2" min="1" max="{{ $store->balance->current_balance }}" required>
        </div>

        <div class="mb-4">
            <label for="bank" class="block text-sm font-medium text-gray-700">Pilih Bank</label>
            <select name="bank" class="mt-1 w-full border rounded-md px-3 py-2" required>
                <option value="bank_1">Bank 1</option>
                <option value="bank_2">Bank 2</option>
                <option value="bank_3">Bank 3</option>
                <option value="bank_4">Bank 4</option>
                <option value="bank_5">Bank 5</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="account_number" class="block text-sm font-medium text-gray-700">Nomor Rekening</label>
            <input type="text" name="account_number" class="mt-1 w-full border rounded-md px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="account_name" class="block text-sm font-medium text-gray-700">Nama Rekening</label>
            <input type="text" name="account_name" class="mt-1 w-full border rounded-md px-3 py-2" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Ajukan Penarikan</button>
    </form>

    <!-- Riwayat Penarikan Dana -->
    <h2 class="text-xl font-semibold mb-4">Riwayat Penarikan Dana</h2>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($store->balance->withdrawals as $withdrawal)
                    <tr>
                        <td class="px-4 py-2">{{ $withdrawal->created_at->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($withdrawal->amount, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
