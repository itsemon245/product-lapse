@extends('layouts.admin.app')
@section('main')
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        <input type="text" name="name" />
        <input type="text" name="url" />
        <select name="stage">
            <option value="one">kdflahe</option>
            <option value="one">kdfla</option>
            <option value="one">kdfla</option>
            <option value="one">kdfla</option>
            <option value="one">kdfla</option>
        </select>
        <x-attach name="logo" />
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <button type="submit">submit</button>
    </form>
@endsection