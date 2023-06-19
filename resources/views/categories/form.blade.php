{{csrf_field()}}
<input type="hidden" name="id" value="{{ $category->id }}">
<div class="row mt-5">
  <div class="mx-auto" style="width: 500px">
      <div class="form-group">
        <label for="name" class="mb-1">Name</label>
        <input type="text" class="form-control mb-3" name="name" id="name" value="{{ old('name', $category->name)}}">
        <div class="error">{{$errors->first('name')}}</div>
      </div>
      <div class="form-group">
        <label for="category" class="mb-1">Main Category</label>
        <select class="form-control mb-3" name="main_category" id="category">
          <option value="0">Select</option>
            @foreach($main_categories as $main_category)
                <option value="{{$main_category->id}}" {{($category->main_category === $main_category->id) ? "selected" : null}}>
                  {{$main_category->name}}
                </option>
            @endforeach
        </select>
        <div class="error">{{$errors->first('main_category')}}</div>
      </div>
  </div>
</div>
<div class="mt-5 text-center">
  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</div>


