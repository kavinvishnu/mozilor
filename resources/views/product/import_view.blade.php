@extends('layouts.app')
@section('content')   
<div class="container">
    <h2 class="text-center">
        IMPORT PRODUCT
    </h2>
    

    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif
    
    @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
 
    <form action="{{ route('import_product') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
         <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">{{ __('CHOOSE xls/csv FILE') }}</label>
            <div class="col-md-3">
                <input type="file" name="file" class="form-control" required>
             </div>
        </div>
         <div class="form-group row mb-0">
            <div class="col-md-3 offset-md-4">
                <button type="submit" class="btn btn-primary" onclick="showspinner()">
                    {{ __('SUBMIT') }}
                </button>
                <a href="{{route('importformat')}}" class="btn btn-success" style="float: right;margin-top:0.2%">Download Format</a>
            </div>
        </div>
    </form>
</div>
@endsection
