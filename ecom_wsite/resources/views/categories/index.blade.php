
@extends('layout')

@section('title','la liste des categories')

@section('content')
<div class="container mb-8">
   <div class="d-flex justify-content-center mt-4 mb-4">
       <h3><span class="badge bg-secondary ">La liste des categories</span></h3>
   </div>
   @if (Session::has("success"))
   <div class="alert alert-primary alert-dismissible fade show col-6" >
       {{Session::get('success')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
   @if (Session('failed'))
    <div class="alert alert-danger alert-dismissible fade show col-6" >
        {{Session('failed')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

   @endif
   <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href={{route('categories.create')}} class="text-decoration-none btn btn-primary"> Ajouter une categorie</a>

   </div>
</div>
   <div class="container col-10 d-flex justify-content-center justify-items-center">
    <table class="table table-striped table-hover ">
        <thead>
                <tr>
                <th>Nom de la categories</th>
                <th>Action</th>
                </tr>
        </thead>
        <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td class="d-flex gap-1">
                            <a href={{route('categories.edit',$category->id)}} class="btn btn-primary">Modifier</a>
                            <form action={{route("categories.destroy",$category->id)}} method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Etes-vous sur?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
   </div>
   <div class="col-6 ">
    {{ $categories->links()}}
   </div>
@endsection
