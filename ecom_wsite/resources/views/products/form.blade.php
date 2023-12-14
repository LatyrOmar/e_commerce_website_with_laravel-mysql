<div class="container mt-4 ">
    <div class="row d-flex justify-content-center ">
        <div class="col-6">
            <div class="mb-3 form-floating">
                <label for="name" class="form-label " >nom</label>
                <input type="text" class="form-control @error("title") is-invalid @enderror " id="name" name='title' value={{old('title')}} >
                @error('title')
                 <div class="invaled-feedback ">{{$message}}</div>
                @enderror


            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">prix</label>
                <input type="string" class="form-control" id="price" name="prix" placeholder="fcfa">
                @error('prix')
                <div class="invaled-feedback ">{{$message}}</div>
               @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="number" class="form-control" id="stock" name="stock">
                @error('stock')
                <div class="invaled-feedback ">{{$message}}</div>
               @enderror
            </div>
            <div class="mb-3">
                <p>Status:</p>
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="status" id="oui" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                    oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="non">
                    <label class="form-check-label" for="non">
                    non
                    </label>
                </div>

            </div>
            <div class="mb-3 ">
                <label for="exampleFormControlTextarea1" class="form-label">description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                @error('description')
                <div class="invaled-feedback ">{{$message}}</div>
               @enderror
            </div>
            <div class="mb-3 form-floating">
                <label for="formFileDisabled" class="form-label"></label>
                <input class="form-control" type="file" id="image" name="image" >
            </div>
            <div class="mb-3 form-floating ">
                <select name="category_id" id="category_id" class="form-select ">
                @if (isset($product->category_id))
                  <option value="{{$product->category_id}}">
                    {{$product->category->name}}
                  </option>

                @endif
                    <option selected >Choisisser la categorie du produit</option>
                     @foreach ($categories as $category)
                       @if(isset($product->category_id))
                          @if($product->category_id != $category->id)
                      <option value={{$category->id}}>{{$category->name}}</option>
                       @endif
                       @else
                       <option value={{$category->id}}>{{$category->name}}</option>
                       @endif
                     @endforeach
                </select>
                @error('category_id')
                   <div class="invaled-feedback ">{{$message}}</div>
                @enderror
            </div>




    </div>
    </div>


</div>
