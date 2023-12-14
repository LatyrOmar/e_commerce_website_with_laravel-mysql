@extends('layout')

@section('title',"modification d'une categorie")

@section('content')
    <h3>Modification de la categorie:
        <strong>{{$category->name}}</strong>
    </h3>
    <form action={{route('categories.update',$category->id) }} method="post">
    @csrf
    @method('PUT')
    @include('categories.form')
    <div class="d-flex flex-row gap-2 ">
        <button class="btn btn-warning">
            Modifier la categorie
        </button>
        <a href={{route('categories.index')}} class="btn btn-secondary">
            Annuler la modification
        </a>

    </div>
    </form>
@endsection
