@extends('layouts.app')
@section('content')
<div class="container">
<h1 style="text-align: center;">PRODUCT DETAILS</h1>
	<div class="table-responsive" style="display:flex;"> 
		<table border="1" class="table table-striped table-hover text-center " style="width:100%;margin-top: 2%;">
			<tr  style="background-color:#fff">
				<th>PRODUCT ID</th>
				<th>PRODUCT NAME</th>
				<th>PRICE</th>
				<th>SKU</th>
				<th>DESCRIPTION</th>
				<th>EDIT</th>
			</tr>
			<?php foreach($data as $value) { ?>
			<tr>
				<td>{{$value['id']}}</td>
				<td>{{$value['product_name']}}</td>
				<td>{{$value['price']}}</td>	
				<td>{{$value['sku']}}</td>	
				<td>{{$value['description']}}</td>	
				<td class="edit-container"><a href="{{route('product_edit',['id'=>$value['id']])}}">EDIT</a></td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
@endsection

