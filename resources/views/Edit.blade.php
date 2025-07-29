@extends('layouts.FrontendLayouts')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto my-5">
            <div class="card">
                <div class="card-header bg-primary text-white">Edit Todo</div>
                <div class="card-body">
                    <form action="{{ route('update', $todo->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" value="{{ old('title', $todo->title) }}" placeholder="Todo title" class="form-control my-3" id="todo" name="title">
                            @error('title')
                            <p class="text-start text-danger">{{ $message }}</p>
                            @enderror
                            <textarea type="text" placeholder="Todo details" class="form-control my-3" id="todo" name="detail">{{ old('detail', $todo->detail) }}</textarea>
                            @error('detail')
                            <p class="text-start text-danger">{{ $message }}</p>
                            @enderror
                            <label for="" class="form-label d-block text-start my-3">
                                Publish Date
                                <input value="{{ old('publish_date', $todo->publish_date) }}" type="date" class="form-control" id="todo" name="publish_date">
                            </label>
                            @error('publish_date')
                            <p class="text-start text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100">Update Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
