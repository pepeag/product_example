@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product CRUD Example </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create Product <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
</div>
<br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Date Created</th>
        <th>Actions</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->created_at }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                <a href="{{ route('products.show',$product->id) }}" title="Show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>
                &nbsp;

                <a href="{{ route('products.edit',$product->id) }}">
                    <i class="fas fa-edit  fa-lg"></i>
                </a>
                &nbsp;
                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                
                    <i class="fas fa-trash fa-lg text-danger"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

@endsection