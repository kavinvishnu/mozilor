@extends('layouts.app')
@section('content')
<div class="container">
<h1 style="text-align: center;">EDIT PRODUCT</h1>
<div class="content" style="height:auto;width: 100%;">
	<form method="GET" action="{{ url('editproduct') }}">
        <div class="form-group row">
           <!--  <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label> -->
            <div class="col-md-4">
                <input id="id" type="hidden" class="form-control" name="id" value="{{$data->id}}">
             </div>
        </div>
		<div class="form-group row">
            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('PRODUCT NAME') }}</label>
			<div class="col-md-4">
                <input id="product_name" type="text" class="form-control" name="product_name" value="{{$data->product_name}}" minlength="3" required>
			 </div>
        </div>
        <div class="form-group row">
            <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>
			<div class="col-md-4">
                <input id="sku" type="text" class="form-control" name="sku" value="{{$data->sku}}" required>
			 </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('PRICE') }}</label>
            <div class="col-md-4">
                <input id="price" type="text" class="form-control" name="price" value="{{$data->price}}" required>
             </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('DESCRIPTION') }}</label>
            <div class="col-md-4">
                <textarea id="description" type="text" class="form-control" name="description" required>{{$data->description}}</textarea> 
             </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('UPDATE') }}
                </button>
            </div>
        </div>
	</form>
</div>
</div>
@endsection