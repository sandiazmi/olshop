@extends('layouts.app')

@section('content')
<div class="container">
    <div class="colomn">
        <div class="columns">
            @if ($items)
            <div class="column is-8">
                <h1 class="is-size-2">Shopping Cart</h1>
                @php
                $totalItems = 0;
                $totalPrice = 0;
                @endphp
                @foreach ($items as $item)
                @php
                $totalItems += $item['qty'];
                $totalPrice += $item['price'];
                @endphp
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">{{ $item['name'] }}</p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <div class="columns">
                                <div class="column is-3">
                                    <img src="{{ $item['image'] }}" alt="" class="image is-128*128">
                                </div>
                                <div class="column is-9">
                                    <p class="is-9">{{ $item['description'] }} </p>
                                    <p class="has-text-danger is-size-3">
                                        {{ format_rupiah($item['price']) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="column is-4">
                <h1 class="is-size-2">Cart Detail</h1>
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <p>Total Item : {{ $totalItems }}</p>
                            <p>Total Price : {{ format_rupiah($totalPrice) }}</p>
                            <hr>
                            <a href="" class="button is-danger is-fullwidth">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <h1 class="is-size-5">
                            No Item in Cart
                        </h1>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
