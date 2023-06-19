{{csrf_field()}}
<input type="hidden" name="id" value="{{ $product->id }}">
<div class="row mt-5">
  <div class="col-md-6">
      <div class="form-group">
        <label for="name" class="mb-1">Title</label>
        <input type="text" class="form-control mb-3" name="name" id="name" value="{{ old('name', $product->name)}}">
        <div class="error">{{$errors->first('name')}}</div>
      </div>
      <div class="form-group">
        <label for="code" class="mb-1">Code</label>
        <input type="text" class="form-control mb-3" name="code" id="code" value="{{ old('code', $product->code)}}">
        <div class="error">{{$errors->first('code')}}</div>
      </div>
      <div class="form-group">
        <label for="category" class="mb-1">Category</label>
        <select class="form-control mb-3" name="category_id" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{($product->category_id === $category->id) ? "selected" : null}}>{{$category->name}}</option>
            @endforeach
        </select>
        <div class="error">{{$errors->first('category_id')}}</div>
      </div>
      <div class="form-group">
        <label for="warranties" class="mb-1">Warranty Period</label>
        <select class="form-control mb-3" name="warranty" id="warranties">
            @foreach($warranties as $warranty)
                <option value="{{$warranty}}" {{($product->warranty === $warranty) ? "selected" : null}}>
                  {{$warranty}}
                </option>
            @endforeach
        </select>
        <div class="error">{{$errors->first('warranty')}}</div>
      </div>
      <div class="form-group">
        <label for="seller" class="mb-1">Seller</label>
        <select class="form-control mb-3" name="seller_id" id="seller">
          @foreach($sellers as $seller)
              <option value="{{$seller->id}}" {{($product->seller_id === $seller->id) ? "selected" : null}}>
                {{$seller->name}}
              </option>
          @endforeach
        </select>
        <div class="error">{{$errors->first('seller')}}</div>
      </div> 
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control-file" id="image">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
        <label for="price" class="mb-1">Price</label>
        <input type="number" class="form-control mb-3" name="price" id="price" value="{{old('price', $product->price)}}">
        <div class="error">{{$errors->first('price')}}</div>
      </div>
      <div class="form-group">
        <label for="quantity" class="mb-1">Quantity</label>
        <input type="number" class="form-control mb-3" name="quantity" id="quantity" value="{{old('quantity', $product->quantity)}}">
        <div class="error">{{$errors->first('quantity')}}</div>
      </div>
      <div class="form-group">
        <label for="brand" class="mb-1">Brand</label>
        <select class="form-control mb-3" name="brand_id" id="brand">
          @foreach($brands as $brand)
              <option value="{{$brand->id}}" {{($product->brand_id === $brand->id) ? "selected" : null}}>
                {{$brand->name}}
              </option>
          @endforeach
        </select>
        <div class="error">{{$errors->first('brand')}}</div>
      </div>
      <div class="form-group">
        <label for="description" class="mb-1">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control mb-3" >
          {{old('description', $product->description)}}
        </textarea>
        <div class="error">{{$errors->first('description')}}</div>
      </div>
  </div>
</div>
<div class="mt-5">
  <button type="submit" class="btn btn-primary btn-lg" style="float: right">Submit</button>
</div>


