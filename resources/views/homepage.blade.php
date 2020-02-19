@extends('layouts.app')

@section('content')

<div class="colomn">
    <div class="columns">
        <div class="column is-2">
            @include('frontend.components.sidebar')
        </div>
        <div class="column is-10">
            <div class="columns is-multiline">
                @foreach ($products as $product)
                <div class="column is-2">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="{{ $product->getImage() }}" alt="">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h1 class="is-size-6"><a
                                        href="{{ route('frontend.product.show', $product) }}">{{ $product->name }}</a>
                                </h1>
                                <p class="has-text-danger">Rp. {{ number_format($product->price, 0, ",", ".") }}</p>
                            </div>
                            <a href="{{ route('cart.add.item', $product) }}" class="button is-info">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links('vendor/pagination/bulma') }}
        </div>
    </div>
</div>
@endsection
