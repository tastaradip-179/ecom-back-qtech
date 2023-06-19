{{csrf_field()}}
<input type="hidden" name="id" value="{{ $seller->id }}">
<div class="row mt-5">
  <div class="mx-auto" style="width: 500px">
      <div class="form-group">
        <label for="name" class="mb-1">Name</label>
        <input type="text" class="form-control mb-3" name="name" id="name" value="{{ old('name', $seller->name)}}">
        <div class="error">{{$errors->first('name')}}</div>
      </div>
  </div>
</div>
<div class="mt-5 text-center">
  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</div>

