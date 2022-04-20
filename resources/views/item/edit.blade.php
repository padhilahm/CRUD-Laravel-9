@extends('item.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Update item</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('item') }}"> Back</a>
        </div>
    </div>
    <form method="post" action="{{ route('item.update',$item->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ old('name', $item->name) }}">
            @error('name')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{ old('price', $item->price) }}">
            @error('price')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Price:</label>
            <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" value="{{ old('image', $item->image) }}">
            @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection