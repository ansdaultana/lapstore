@extends('layout')
@include('navbar')
<main>
    <div class="ml-5 md:ml-20">
        <div class=" text-2xl p-2 font-sans">
            Your Cart!
        </div>
        <div class=" p-2">
            You have <span class="text-orange-600 font-bold text-lg">{{count(session('cart',[]))}}</span>
            item in you cart.
        </div>
    </div>
    <div class="h-screen bg-slate-200">
        @foreach(session('cart', [])  as $slug => $item)
        <p>{{ $slug }} - Quantity: {{ $item['quantity'] }}</p>
        @endforeach
    </div>
</main>
@include('footer')
