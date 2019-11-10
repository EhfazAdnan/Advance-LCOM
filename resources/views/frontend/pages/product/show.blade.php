@extends('frontend.layouts.master')

@section('title')
   {{ $product->title }} | Laravel Ecommerce Website
@endsection

@section('content')
<div class="container margin-top-20">
   <div class="row">

      <div class="col-md-4">

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

        @foreach($product->images as $key=>$image)
            <div class="product-item carousel-item {{ $key == 0 ? 'active' : '' }}">
               <img class="d-block w-100" src="{{ asset('images/products/'.$image->image) }}" alt="" height="400">
            </div>
        @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>

      </div>

      <div class="col-md-8">
         <div class="widget">
           <h4>Product Details - {{ $product->title }} in <mark>{{ $product->category->name }}</mark></h4>
           <h4 class="mt-3">Product Price - {{ $product->price }} Taka 
             <span class="badge badge-primary">
                {{ $product->quantity < 1 ? 'No item is Available' : $product->quantity. ' items in stock' }}
             </span>
           </h4>

           <hr>

           <div class="product-description">
               {!! $product->description !!}
           </div>

         </div>

         <div class="widget">
         
         </div>

      </div>
   </div>
</div>
@endsection

