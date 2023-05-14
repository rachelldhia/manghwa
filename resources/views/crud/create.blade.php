@extends('layouts.app')
@section('main')


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Create Manga Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Add Data </h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ url('/manga') }}" enctype="multipart/form-data"> Return</a>
                </div>
            </div>
        </div>


        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{  url("/manga/datamanga") }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" value="{{ 'title' }}">
                        @error('title')
                        <span class="text-danger">
                            {{ $message }}
    
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Author</label>
                        <textarea name="author" class="form-control" id="" rows="3">{{ 'author' }}</textarea>
                        @error('author')
                        <span class="text-danger">
                            {{ $message }}
    
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Rate</label>
                        <textarea name="rate" class="form-control" id="" rows="3">{{ 'rate' }}</textarea>
                        @error('rate')
                        <span class="text-danger">
                            {{ $message }}
    
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desc" class="form-control" id="" rows="3">{{ 'desc'}}</textarea>
                        @error('desc')
                        <span class="text-danger">
                            {{ $message }}
    
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Genre</label>
                        <textarea name="genre" class="form-control" id="" rows="3">{{ 'genre'}}</textarea>
                        @error('genre')
                        <span class="text-danger">
                            {{ $message }}
    
                        </span>
                        @enderror
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input class="form-control" type="file" name="gambare" id="formFile">
                      </div>      
                    @error('gambar')
                    
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>     

                        {{ $message }}
                        
                    @enderror

                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                <button class="btn btn-danger"><a href="{{ url('/manga') }}"
                    style="color: white; text-decoration: none">Cancel</a></button>
            </div>
        </form>
    </div>
</body>

</html>
    

@endsection