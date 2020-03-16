@extends('layouts.main')

@section('title', $categoryName)

@section('main')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>{{ $categoryName }}</h2>
                        @component('partials.breadcrumbs')
                            <a href="/">Home</a>
                            <span>Shop</span>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </section>
            
    <section class="categories-page">
        <div class="container d-lg-flex">
            <div class="categories-controls">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="categories-filter">
                            <div class="cf-left">
                                <ul>
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row col-lg-10 product-list" id="product-list">                
                @foreach($products as $product)
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                        </a>
                        <div class="product-text">
                            <h6>{{ ucwords($product->name) }}</h6>
                            <p>{{ price_format($product->price) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
        <div class="cf-right col-lg-6">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </section>

@endsection