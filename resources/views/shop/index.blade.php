@extends('layouts.main')

@section('title', 'Shop')

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
        <div class="container">
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
                                {{-- <form action="">
                                    <select class="sort">
                                            <option value="all">All</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach    
                                    </select>
                                </form> --}}
                            </div>
                            <div class="cf-right">
                                <form action="">
                                    <select class="sort">
                                        <option value="">Latest</option>
                                        <option value="">Price(Up to Down)</option>
                                        <option value="">Price(Down to Up)</option>
                                    </select>
                                </form>                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row" id="product-list">                
                @foreach($products as $product)
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                        </a>
                        <div class="product-text">
                            <h6>{{ $product->name }}</h6>
                            <p>{{ priceFormat($product->price) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            <div class="cf-right">
                {{ $products->appends(request()->input())->links() }}
            </div>
        </div>
    </section>

@endsection