@extends('layout')

@section('title', $product->title)

@section('content')
<div class="d-flex justify-content-center justify-items-center ">
    <div class="row col-md-12 container gap-0 mt-3">
    <div class="col-md-3">
        <img src="{{$product->image}}" alt="image du produit" class="img img-thumbnail rounded w-80 ">
    </div>
    <div class="col-md 9">
        <h3>{{$product->title}}</h3>
        <p>{{$product->price}} FCFA</p>
        <p class="text">
            {{!! $product->description !!}}
        </p>
        <p class="text">
            <strong>Stock: </strong>{{$product->stock}}
        </p>
        <p class="text">
        <strong>Status:</strong>
            @if ($product->status == true)
            <span class="badge text-bg-success ">Activé</span>

            @else

            <span class="badge text-bg-danger ">Désactivé</span>

        @endif
        </p>

    </div>
    <div class="mt-3 d-flex justify-content-center " >
        <a href={{route('products.index')}} class="badge text-bg-primary text-lg-center text-decoration-none p-3 text-white ">liste des produits</a>
    </div>
    </div>

</div>
@endsection
