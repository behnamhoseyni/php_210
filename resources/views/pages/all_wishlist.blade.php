@extends('layout')

@section('feature-items')
	
	@foreach($all_wishlist as $product)
		@include('items.product')
	@endforeach
@endsection