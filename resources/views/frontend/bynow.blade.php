@extends('layouts.front')

@section('title','Checkout')


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="container mt-5">

        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6><b>Basic Details</b></h6>
                    <hr>
                    <form
                            role="form"
                            action="{{ route('stripe.post') }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                    <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">Frist Name</label>
                                <input type="text" class="form-control cfname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter first Name" required>
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control clname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter last Name" required>
                                <span id="lname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control cemail" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email" required>
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Numero</label>
                                <input type="text" class="form-control cphone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Numero" required>
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Adress 1</label>
                                <input type="text" class="form-control cadress1" value="{{ Auth::user()->adress1 }}" name="adress1" placeholder="Enter Adress 1" required>
                                <span id="adress1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Adress 2</label>
                                <input type="text" class="form-control cadress2" value="{{ Auth::user()->adress2 }}" name="adress2" placeholder="Enter Adress 2" required>
                                <span id="adress2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control ccity" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City" required>
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control cstate" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State" required>
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                               <input type="text" class="form-control ccountry" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country" required>
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text" class="form-control cpincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code" required>
                                <span id="pincode_error" class="text-danger"></span>
                            </div>

                    </div><br><br>
                    <h6><b>Payments Details</b></h6>
                    Pay With Debit Or Credit Card <img decoding="async" src="https://meniptv.com/wp-content/uploads/2022/11/whish.png" alt="Pay With Debit Or Credit Card" />	</label>

                    <hr>

                        @csrf



                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text' required>
                            </div>
                        </div>
  <br>

                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' required>

                  <br>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' required>
                            </div>
                        </div>







                </div>
            </div>
        </div>



            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>


                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> {{ $name }}</td>
                                    <td> {{ $quantity}}</td>
                                    <td> ${{ $prix}}</td>
                                </tr>
                                @php  $total = $quantity * $prix @endphp


                                <input type="hidden" name="id" class="form-control cid"  value="{{ $id }}" >
                                <input type="hidden" name="total" class="form-control ctotal" value="{{ $total }}" >
                                <input type="hidden" name="quantity" class="form-control cquantity"  value="{{ $quantity }}" >
                                <input type="hidden" name="prix" class="form-control cprix"  value="{{ $prix }}" >

                            </tbody>
                        </table>
                        <hr>

                        <h4 class="px-2">Grand Total : <span class="float-end"> ${{ $total }}</span></h4>
                        <br>
                        <button type="submit" class="btn btn-success w-100" id="Ttttn">Place Order</button>


                        </form>
</div>
                </div>
            </div>
       </div>

</div>

@endsection


@section('scripts')

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

     $(document).ready(function(){
        $('#Ttttn').click(function (){

        var cfname = $('.cfname').val();
        var clname = $('.clname').val();
        var cemail = $('.cemail').val();
        var cphone = $('.cphone').val();
        var cadress1 = $('.cadress1').val();
        var cadress2 = $('.cadress2').val();
        var ccity = $('.ccity').val();
        var cstate = $('.cstate').val();
        var ccountry = $('.ccountry').val();
        var cpincode = $('.cpincode').val();
        var cid = $('.cid').val();
        var ctotal = $('.ctotal').val();
        var cquantity = $('.cquantity').val();
        var cprix = $('.cprix').val();


 $.ajax({
     method: "POST",
     url:"by-derict",
     data: {
                'cfname' :cfname ,
                'clname' :clname ,
                'cemail' :cemail ,
                'cphone' :cphone ,
                'cadress1' :cadress1 ,
                'cadress2' :cadress2 ,
                'ccity' :ccity ,
                'cstate' :cstate ,
                'ccountry' :ccountry ,
                'cpincode' :cpincode ,
                'cid' :cid ,
                'ctotal' :ctotal ,
                'cquantity' : cquantity ,
                'cprix' :cprix ,
            },
     success: function (response) {
        // window.location.reload();
        saw(response);

     }
 });
 });
     });

 </script>
@endsection
