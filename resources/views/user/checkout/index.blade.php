@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($carts->isEmpty())
        <div class="bg-white p-8 rounded-lg shadow text-center">
            <p class="text-gray-500">Your cart is empty.</p>
            <a href="{{ route('products') }}" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded hover:bg-gray-800">
                Continue Shopping
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Cart Items --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                    @foreach($carts as $cart)
                        <div class="flex items-center gap-4 py-4 border-b">
                            @if($cart->product->productImages->first())
                                <img src="{{ asset('storage/' . $cart->product->productImages->first()->image) }}" 
                                     alt="{{ $cart->product->name }}" 
                                     class="w-20 h-20 object-cover rounded">
                            @endif
                            <div class="flex-1">
                                <h3 class="font-medium">{{ $cart->product->name }}</h3>
                                <p class="text-sm text-gray-500">Qty: {{ $cart->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Order Total --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h2 class="text-xl font-semibold mb-4">Total</h2>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="border-t pt-4 mb-6">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <button class="w-full bg-black text-white py-3 rounded hover:bg-gray-800 transition">
                        Proceed to Payment
                    </button>
                    <a href="{{ route('cart.index') }}" class="block text-center mt-4 text-sm text-gray-600 hover:text-black">
                        Back to Cart
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
