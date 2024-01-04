@extends('layouts.admin.app')
@section('main')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <a href="">View</a>
                <a href="{{ route('product.edit', $product) }}">Edit</a>
                <a href="{{ route('product.destroy', $product) }}">Delete</a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection