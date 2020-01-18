@extends('shop::layouts.master')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">1</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"> {{ $course->name }}</h6>
                            <small class="text-muted">{{ $course->summary }}</small>
                        </div>
                        <span class="text-muted">${{ $course->price }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{ $course->price }}</strong>
                    </li>
                </ul>

            </div>
            <div class="col-md-8 order-md-1">
                <form action="{{ route('payment.process') }}" method="POST" novalidate>
                    @csrf
                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">

                            <label for="pay_pal">
                                <input id="pay_pal" name="paymentMethod" type="radio" value="pay_pal" checked required>
                                Paypal
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <label for="coin_payment">
                                <input id="coin_payment" name="paymentMethod" type="radio" value="coin_payment" required>
                                Coin payment (BTC) </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <label class="" for="rave_pay">
                                <input id="rave_pay" name="paymentMethod" type="radio" value="rave_pay" required>
                                Rave Pay </label>
                        </div>
                    </div>
                    {{--<div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>--}}
                    <hr class="mb-4">
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Continue to checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection