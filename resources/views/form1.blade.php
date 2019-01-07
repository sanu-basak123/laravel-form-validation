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
                    <form class="form-horizontal" novalidate onsubmit="formSubmitJS.submit(event);">
                        <div class="form-group">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <label class="col-sm-4 control-label" for="email">Username</label>
                            <div class="col-sm-8">
                                <input id="username" class="form-control" type="text" placeholder="username" name="username">
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="password">First Name</label>
                            <div class="col-sm-8">
                                <input id="first_name" class="form-control" type="text" placeholder="first_name" name="first_name">
                            </div>
                          
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="confirm-password">Last Name</label>
                            <div class="col-sm-8">
                                <input id="last_name" class="form-control" type="text" placeholder="last_name"
                                    name="last_name">
                            </div>
                           
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
    var requestURL = '/form1';
    var constraints = {
        username: {
            presence: true,
        },
        first_name: {
            presence: true,
            length: {
                minimum: 5
            }
        },
        last_name: {
            presence: true,
            length: {
                minimum: 5
            }
        },


    };

</script>
@endsection
