@extends('layouts.FrontendLayouts')
@section('content')
    <div class="container mt-5 text-center">
        <h1>Welcome to the All Todos Page</h1>


        <div class="row my-5">
            @forelse ($todos as $todo)
                <div class="col-lg-4 my-3">
                    <div class="card">
                        <div
                            class="card-body text-start {{ Carbon\Carbon::parse($todo->publish_date) < today() && $todo->status == 0 ? 'bg-danger-subtle' : '' }}">
                            <div class="card-header">Title: {{ $todo->title }}
                                <span class="float-end">
                                    {{ Carbon\Carbon::parse($todo->created_at)->diffForHumans() }}
                                </span>
                            </div>
                            <div class="card-body">
                                <p>Details: {{ $todo->detail ?? 'N/A' }}</p>
                                <button
                                    class=" btn btn-sm btn-{{ $todo->status == 1 ? 'success' : 'warning' }}">{{ $todo->status == 1 ? 'Completed' : 'Not Completed' }}</button>
                            </div>
                            <div class="card-footer">
                                <strong>
                                    Due Date: {{ Carbon\Carbon::parse($todo->created_at)->format('d M Y') }}
                                </strong>
                            </div>
                            <div class="card-footer">
                                @if ($todo->status == 0)
                                    <a class="btn btn-info" href="{{ route('edit', $todo->id) }}">
                                        Edit
                                    </a>
                                @endif
                                <a class="btn btn-danger" href="{{ route('delete', $todo->id) }}">
                                    Delete
                                </a>
                                @if ($todo->status == 0 && Carbon\Carbon::parse($todo->publish_date) >= today())
                                    <a class="btn btn-success" href="{{ route('complete', $todo->id) }}">
                                        Mark As Complete
                                    </a>
                                @endif
                            </div>
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
        <nav class="justify-content-between">
            {{ $todos->links() }}
        </nav>
    </div>
@endsection
