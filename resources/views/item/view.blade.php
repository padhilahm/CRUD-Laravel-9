@extends('item.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Laravel 9 CRUD</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('item') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>{{ $item->price }}</td>
        </tr>
    </table>
@endsection