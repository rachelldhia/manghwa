@extends('layouts.app')
@section('main')

    @if ($errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Manga Data </h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ url('manga/datamanga/create') }}"> Add A New Manga</a>
                </div>
            </div>
        </div>

        <div class="card">
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Rate</th>
            <th>Desc</th>
            <th>Genre</th>
            <th>Gambar</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($datamanga as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->rate}}</td>
                <td>{{ $item->desc }}</td>
                <td>{{ $item->genre }}</td>
                <td><img src="/assets/{{ $item->gambar }}" width="100px"></td>
                <td>
            
                    <form action="{{ url("/manga/$item->id") }}" method="Post">
                        <a href="{{ url("/manga/$item->id/edit") }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </html>

@endsection