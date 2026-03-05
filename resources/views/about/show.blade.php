@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $profil->title }}</h1>
        <div>
            {!! nl2br(e($profil->content)) !!}
        </div>
        <p><a href="{{ route('profil.index') }}">Back to list</a></p>
    </div>
@endsection
