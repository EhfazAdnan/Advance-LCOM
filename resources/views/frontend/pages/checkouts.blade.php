@extends('frontend.layouts.master')

@section('content')

<div class="container margin-top-20">

<div class="card card-body">
<h2>Confirm Items</h2>
<hr>

    <div class="row">

       <div class="col-md-7 border-right">
        @foreach(App\Models\Cart::totalCarts() as $cart)
        <p>
          {{ $cart->product->title }} - <strong>{{ $cart->product->price }}</strong> - {{ $cart->product_quantity }} Item
        </p>
        @endforeach
       </div>

       <div class="col-md-5">
          @php
            $total_price = 0;
          @endphp
          @foreach(App\Models\Cart::totalCarts() as $cart)
            @php
               $total_price += $cart->product->price * $cart->product_quantity;
            @endphp
          @endforeach
          <p>Total Price : <strong>{{ $total_price }} Taka</strong></p>
          <p>Total Price with shipping cost : <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }} Taka</strong></p>
       </div>

    </div>
   <p>
      <a href="{{ route('carts') }}">Change Cart Items</a>
   </p>
</div>

<div class="card card-body mt-3">
<h2>Shipping Address</h2>

<form method="POST" action="{{ route('user.profile.update') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciver Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" 
                                value="{{ Auth::check() ? Auth::user()->first_name.''.Auth::user()->last_name : '' }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" 
                                value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" rows="4" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address" 
                                >{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="payment_method_id" required>
                                   <option value="">Select a payment please</option>
                                   @foreach($payments as $payment)
                                      <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Order Now
                                </button>
                            </div>
                        </div>
</form>

</div>

</div>

@endsection