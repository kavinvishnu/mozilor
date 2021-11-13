@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div>
                        <a class="btn btn-primary import-product" id="import-product-view" href="{{ url('import_product_view') }}">Import Product</a>
                        <a class="btn btn-warning" id="product-view" href="{{ url('product_view') }}">View Product</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
