@extends('includes.header')

@section('content')

    @foreach($products as $product)
    <div class="card" style="margin: 20px;">
        <div class="card-header">
            Product #{{ $product->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            
            <a href="/products/{{ $product->id }}" class="btn btn-success">Get Details</a>
            <a href="/products/{{ $product->id }}/edit" class="btn btn-warning">Update</a>

            <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
    </div>
    @endforeach

@endsection
