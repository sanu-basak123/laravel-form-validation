@extends('layouts.app')
@section('content')
<style>
    .help-block.error {
      margin-bottom: 5px;      
}


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form class="form-horizontal" novalidate onsubmit="formSubmitJS(event,constraints,url);">
                        <div class="form-group">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            <label class="col-sm-4 control-label" for="email">Email</label>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" type="email" placeholder="Email" name="email">
                            </div>
                            <div class="col-sm-5 messages"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="password">Password</label>
                            <div class="col-sm-8">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="col-sm-5 messages"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="confirm-password">Confirm password</label>
                            <div class="col-sm-8">
                                <input id="confirm-password" class="form-control" type="password" placeholder="Confirm password"
                                    name="confirm-password">
                            </div>
                            <div class="col-sm-5 messages"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="zip">ZIP Code</label>
                            <div class="col-sm-8">
                                <input id="zip" class="form-control" type="text" placeholder="12345" name="zip">
                            </div>
                            <div class="col-sm-5 messages"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
<script src="{{ asset('js/formsubmit.js')}}"></script>
<script>
    var constraints = {
        email: {
            presence: true,
            email: true
        },
        password: {
            presence: true,
            length: {
                minimum: 5
            }
        },
        "confirm-password": {
            presence: true,
            equality: "password"
        },

        zip: {
            format: {
                pattern: "\\d{5}"
            }
        },

    };

</script>
@endsection
