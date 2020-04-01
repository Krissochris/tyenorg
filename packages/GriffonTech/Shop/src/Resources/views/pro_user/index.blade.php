@extends("shop::layouts.master")


@section("content")
    <div class="container col-sm-9">
        <div class="py-5 text-center">
            <h2>Become A Pro User</h2>
        </div>
        @if(setting('pro_membership_fee'))
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <ul class="list-group mb-3">
                        <li class="list-group-item justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"> Pro User Package </h6>
                                <small class="text-muted"> </small>
                            </div>
                            <span class="text-danger font-weight-bold float-right">$15</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{ setting('pro_membership_fee') }}</strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <div class="card">
                        <form action="{{ route('user.pro_user.process') }}" method="POST" novalidate>
                            @csrf
                            <h4 class="mb-3 card-header">Payment</h4>

                            <div class="d-block my-3 card-body">
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
                                <div class="custom-control custom-radio">
                                    <label for="bank_deposit">
                                        <input id="bank_deposit" name="paymentMethod" type="radio" value="bank_deposit" required>
                                        Bank Deposit </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Continue to checkout</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <br>
                </div>
            </div>
        @endif
    </div>
@endsection
