@extends('maindesign')
<base href="/public">
@section('stripe_view')

<div class="container mt-5">

    <h1 class="mb-4">Online Payment Gateway. Please Insert Your Information</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Payment Details</h4>
                </div>

                <div class="card-body">

                    <form 
                        role="form"
                        action="{{ route('stripe.post') }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">

                        @csrf

                        <div class='form-group'>
                            <label class='control-label'>Name on Card</label>
                            <input class='form-control' type='text' required>
                        </div>

                        <div class='form-group'>
                            <label class='control-label'>Card Number</label>
                            <input autocomplete='off' class='form-control card-number' type='text' required>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='311' type='text' required>
                            </div>

                            <div class="col-md-4 form-group">
                                <label class='control-label'>Exp Month</label>
                                <input class='form-control card-expiry-month' placeholder='MM' type='text' required>
                            </div>

                            <div class="col-md-4 form-group">
                                <label class='control-label'>Exp Year</label>
                                <input class='form-control card-expiry-year' placeholder='YYYY' type='text' required>
                            </div>
                        </div>

                        <div class="form-group text-center mt-3">
                            <button class="btn btn-success btn-lg btn-block" type="submit">
                                Pay Now BDT({{$price}})
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
