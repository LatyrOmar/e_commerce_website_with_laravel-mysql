@extends('layout')

@section('title','products list')

@section('content')
    <div class="container">
      <div class="d-flex justify-content-center mt-4">
          <h3><span class="badge bg-secondary">liste des produits</span></h3>
      </div>
      @if (Session::has('success'))
      <div class="alert alert-primary alert-dismissible fade show  col-6" role="alert">
        {{Session::get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2 mb-4">
        <a href={{route('products.create')}} class="text-decoration-none btn btn-primary"> Ajouter un produit</a>
      </div>
    </div>
      <div class="container col-10 d-flex justify-content-center">
        <table class="table table-striped table-hover">
          <thead>
             <tr>
                <th>Image</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Categorie</th>
                {{-- <th>Description</th> --}}
                <th>Status</th>

                <th>Action</th>
             </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
                <td><img src={{$product->image}} width=80px height=80px alt="" class="rounded"></td>
                <td>{{$product->prix}} fcfa</td>
                <td>{{$product->stock}}</td>
                <td class="badge text-bg-info ">{{$product->category->name}}</td>
                {{-- <td>{{$product->description}}</td> --}}
                <td>
                    @if ($product->status == true)
                     <span class="badge text-bg-success ">Activé</span>

                      @else

                       <span class="badge text-bg-danger ">Désactivé</span>

                    @endif
                </td>

                <td class="d-flex gap-2">
                    <a href={{route('products.edit',$product->id)}} class="btn btn-primary">Modifier</a>
                    <a href={{route('products.show',$product->id)}} class=" btn btn-warning">Detail</a>
                    <form action={{route('products.destroy',$product->id)}} method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" onclick="return confirm('Etes-vous sur?')">Supprimer</button>
                    </form>
                </td>
            </tr>

            @endforeach

          </tbody>
        </table>

      </div>
      <div class="col-6">
        {{ $products->links()}}
     </div>
@endsection
