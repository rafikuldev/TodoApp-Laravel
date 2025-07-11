
@extends('layouts.FrontendLayouts')
@section('content')
<div class="container mt-5 text-center">
  <h1>Welcome to the All Todos Page</h1>


  <div class="row my-5">
    @forelse ($todos as $todo)
      <div class="col-lg-4 my-3">
      <div class="card">
        <div class="card-body text-start">
          <div class="card-header">Title: {{ $todo->title }} </div>
          <div class="card-body">Details: {{ $todo->detail ?? 'N/A' }}</div>
          <div class="card-footer">Date: {{ $todo->created_at }}</div>
          <div class="card-footer">Edit : delete</div>
        </div>
      </div>
    </div>
    @empty
      <div class="col-12">
        <div class="alert alert-warning" role="alert">
          No todos found.
        </div>
      </div>
    @endforelse
  </div>
@endsection
