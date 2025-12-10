<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // Menampilkan halaman Dashboard Admin
   public function dashboard()
{
    // Ambil data store yang sudah diverifikasi
    $storesVerified = Store::where('is_verified', true)->get();
    // Ambil data store yang belum diverifikasi
    $storesUnverified = Store::where('is_verified', false)->get();
    // Ambil data user
    $users = User::all();

    // Kirimkan data $storesVerified dan $storesUnverified ke view admin.dashboard
    return view('admin.dashboard', compact('storesVerified', 'storesUnverified', 'users'));
}

public function storeVerification()
{
    // Ambil data toko yang belum diverifikasi
    $stores = Store::where('is_verified', false)->get();
    return view('admin.store-verification', compact('stores'));
}

public function verifyStore($storeId)
{
    $store = Store::findOrFail($storeId);
    $store->is_verified = true;  // Set toko sebagai terverifikasi
    $store->save();

    return back()->with('status', 'Store Verified');
}

public function rejectStore($storeId)
{
    $store = Store::findOrFail($storeId);
    $store->is_verified = false;  // Set toko sebagai ditolak
    $store->save();

    return back()->with('status', 'Store Rejected');
}


    // Menampilkan semua user dan store
    public function manageUsersAndStores()
    {
        $users = User::all();
        $stores = Store::all();
        return view('admin.user-store-management', compact('users', 'stores'));
    }

    // Hapus user
    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return back()->with('status', 'User Deleted');
    }

    // Hapus store
    public function deleteStore($storeId)
    {
        $store = Store::findOrFail($storeId);
        $store->delete();
        return back()->with('status', 'Store Deleted');
    }
}
