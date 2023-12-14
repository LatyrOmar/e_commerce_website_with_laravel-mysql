@extends('layout')

@section('title',"formulaire d'ajout d'une categorie")

@section('content')
  <div class="container">
        <h3>Formulaire d'ajout d'une nouvelle categorie</h3>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
        @endif

        <form action={{route('categories.store')}} method="post">
            @csrf
            @include('categories.form')
            <div class="container d-flex justify-items-center justify-content-center">
                <div class="d-flex flex-row gap-2 justify-content-center">
                    <button class="btn btn-success">
                        Ajouter une nouvelle categorie
                    </button>
                    <a href={{route('categories.index')}} class="btn btn-dark">
                        Annuler la creation
                    </a>

                </div>
            </div>
        </form>
   </div>
@endsection
