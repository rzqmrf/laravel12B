@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profil</h1>
        <form action="{{ route('profil.update', $profil) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', $profil->title) }}">
            </div>
            <div>
                <label>Content</label>
                <textarea name="content">{{ old('content', $profil->content) }}</textarea>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
