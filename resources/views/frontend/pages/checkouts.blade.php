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

<form method="POST" action="{{ route('checkouts.store') }}" aria-label="{{ __('Register') }}">
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
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Text your message to us..') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" rows="4" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="payment_method_id" required id="payments">
                                   <option value="">Select a payment please</option>
                                   @foreach($payments as $payment)
                                      <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                   @endforeach
                                </select>

                                @foreach($payments as $payment)
                                   
                                      @if($payment->short_name == "cash_in")
                                        <div id="payment_{{$payment->short_name}}" class="alert alert-success hidden text-center mt-2">
                                           <h3>For cash in there is nothing necessary.Just click finish button.</h3>
                                           <br>
                                           <small>You will get your product in two or three business days.</small> 
                                        </div>
                                      @else
                                        <div id="payment_{{$payment->short_name}}" class="alert alert-success hidden text-center mt-3">
                                           <h3>{{ $payment->name }} Payment</h3>
                                           <p><strong>{{ $payment->name }} No : {{ $payment->no }}</strong>
                                           <br>
                                           <strong>Account Type: {{ $payment->type }}</strong>
                                           </p>
                                           <div class="alert alert-success">
                                              Please send the above money to this Bkash Number and write your transection code below the input field.<br>
                                              Your product will send after matching the transection codes.
                                           </div>

                                        </div>
                                      @endif
                                @endforeach

                        
                                <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="put transection code here..">

                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2 text-center">
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

@section('scripts')
    <script type="text/javascript">
        $("#payments").change(function(){
            $payment_method = $("#payments").val();
            if($payment_method == "cash_in"){
                $("#payment_cash_in").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
            }else if($payment_method == "bkash"){
                $("#payment_bkash").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_rocket").addClass('hidden');

                $("#transaction_id").removeClass('hidden');
            }else if($payment_method == "rocket"){
                $("#payment_rocket").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_cash_in").addClass('hidden');

                $("#transaction_id").removeClass('hidden');
            }
        })
    </script>
@endsection