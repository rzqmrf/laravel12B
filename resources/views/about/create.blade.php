@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Profil</h1>
        <form action="{{ route('profil.store') }}" method="POST">
            @csrf
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>
            <div>
                <label>Content</label>
                <textarea name="content">{{ old('content') }}</textarea>
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
@endsection
