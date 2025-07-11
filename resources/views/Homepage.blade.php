@extends('layouts.FrontendLayouts')
@section('content')
<div class="container mt-1 text-center">
  <div class="col-lg-5 my-5 mx-auto">
    <div class="card">
      <div class="card-header bg-success text-white">Add Todo</div>
      <div class="card-body">
        <form action="{{route('store')}}" method="POST">
          @csrf
          <div class="mb-3">
            <input type="text" value="{{ old('title') }}" placeholder="todo title" class="form-control my-3" id="todo" name="title">
            @error('title')
            <p class="text-start text-danger">{{ $message }}</p>
            @enderror
            <textarea type="text"  placeholder="todo details" class="form-control my-3" id="todo" name="detail">{{ old('detail') }}</textarea>
            @error('detail')
            <p class="text-start text-danger">{{ $message }}</p>
            @enderror
            <label for="" class="form-label d-block text-start my-3">
              Publish Date
              <input value="{{ old('publish_date') }}" type="date"class="form-control" id="todo" name="publish_date">
            </label>
            @error('publish_date')
            <p class="text-start text-danger">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary w-100">Add Todo</button>
        </form>
    </div>
  </div>
</div>
@endsection
