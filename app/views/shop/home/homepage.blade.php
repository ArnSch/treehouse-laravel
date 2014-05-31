@extends('shop/layout')

@section('content')
<div class="section banner">

            <div class="wrapper">

                <!-- <img class="hero" src="img/mike-the-frog.png" alt="Mike the Frog says:"> -->
                <div class="button">
                    <a href="/">
                        <h2>Hey, I&rsquo;m Mike!</h2>
                        <p>Check Out My Shirts</p>
                    </a>
                </div>
            </div>

        </div>

        <div class="section shirts latest">

            <div class="wrapper">

                <h2>Mike&rsquo;s Latest Shirts</h2>

                <ul class="products">
                    @foreach ( $recent_products as $product)
                        @include('shop.include.productCard')
                    @endforeach
                </ul>

            </div>

        </div>
@stop