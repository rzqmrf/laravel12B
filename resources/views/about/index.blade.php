@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil List</h1>
        <a href="{{ route('profil.create') }}">Create new</a>
        <ul>
            @foreach ($profils as $item)
                <li>
                    <a href="{{ route('profil.show', $item) }}">{{ $item->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
