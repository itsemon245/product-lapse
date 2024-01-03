@extends('layouts.app')
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
        @foreach ($packages as $package)
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <a href="">View</a>
                <a href="{{ route('package.edit', $package) }}">Edit</a>
                <a href="{{ route('package.destroy', $package) }}">Delete</a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection