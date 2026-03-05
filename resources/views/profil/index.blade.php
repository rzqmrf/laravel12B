@extends('profil.layouts.app')

@section('title', 'Profil List')

@section('content')
    <div class="container">
        <h1 class="text-center">Profil List</h1>
        <a href="{{ route('profil.create') }}" class="btn btn-primary">Create New Profil</a>
        <ul class="list-group mt-4">
            @foreach ($profils as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('profil.show', $item) }}">{{ $item->title }}</a>
                    <span class="badge badge-secondary">{{ $item->created_at->format('d M Y') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
