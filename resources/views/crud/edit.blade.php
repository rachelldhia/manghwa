@extends('layouts.app')
@section('main')

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Create Manga Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    
<div class="mt-5 mx-auto" style="width: 380px">
    @if ($errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

        
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{  url("manga/$datamanga->id") }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" value="{{ old('title', $datamanga->title) }}">
                    @error('title')
                    <span class="text-danger">
                        {{ $message }}

                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Author</label>
                    <textarea name="author" class="form-control" id="" rows="3">{{ old('author', $datamanga->author) }}</textarea>
                    @error('author')
                    <span class="text-danger">
                        {{ $message }}

                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Rate</label>
                    <textarea name="rate" class="form-control" id="" rows="3">{{ old('rate', $datamanga->rate) }}</textarea>
                    @error('rate')
                    <span class="text-danger">
                        {{ $message }}

                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="desc" class="form-control" id="" rows="3">{{ old('desc', $datamanga->desc) }}</textarea>
                    @error('desc')
                    <span class="text-danger">
                        {{ $message }}

                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Genre</label>
                    <textarea name="genre" class="form-control" id="" rows="3">{{ old('genre', $datamanga->genre) }}</textarea>
                    @error('genre')
                    <span class="text-danger">
                        {{ $message }}

                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Gambar</label>
                    <strong>Gambar: </strong>
                    <input type="file" name="gambar" value="{{ old('gambar', $datamanga->gambar) }}"
                        class="form-control" placeholder="Gambar">
                    <img src="/assets/{{ $datamanga->gambar }}" width="100px">    
                          
                    @error('gambar')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button class="btn btn-danger"><a href="{{ url('/manga') }}"
                    style="color: white; text-decoration: none">Cancel</a></button>
                
            </form>
        </div>
    </div>
</div>
@endsection