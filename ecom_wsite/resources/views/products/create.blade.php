@extends('layout')
@section('title',"cration d'un produit")

@section('content')

<h3>Ajout d'un produit</h3>
<form action={{route('products.store')}} method="post">
    @csrf
    @method('POST')
    @include('products.form')
    <div class="container">
        <div class="d-flex flex-row gap-2 ">
            <button class="btn btn-warning">
                Ajouter le produit
            </button>
            <a href={{route('products.index')}} class="btn btn-secondary">
                Annuler la creation
            </a>

        </div>
    </div>
</form>

@endsection


