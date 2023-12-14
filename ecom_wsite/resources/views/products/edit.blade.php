@extends('layout')

@section('title',"modification d'un produit")

@section('content')
<form action={{route('products.update',$product->id)}} methode="post">
    @csrf
    @method('PUT')
    @include('products.form')
    <div class="container d-flex  justify-content-center justify-items-center mt-2">
        <div class="d-flex flex-row gap-2 ">
            <button class="btn btn-warning">
                Modifier le produit
            </button>
            <a href={{route('products.index')}} class="btn btn-secondary">
                Annuler la modification
            </a>

        </div>
    </div>
</form>

@endsection
