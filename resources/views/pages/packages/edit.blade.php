@extends('layouts.admin.app')
@section('main')
    <form action="{{ route('package.update', $datum) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" />
        <input type="number" value="{{ $datum->price }}" name="price" />
        <input type="number" name="monthly_rate" />
        <input type="number" name="annual_rate" />
        <select name="subscription_type">
            <option value="Free">kdflahe</option>
            <option value="Free">kdfla</option>
            <option value="Free">kdfla</option>
            <option value="Free">kdfla</option>
            <option value="Free">kdfla</option>
        </select>
        <textarea name="features" cols="30" rows="10"></textarea>
        <input type="date" name="product_limit" />
        <input type="date" name="validity" />
        <input type="text" name="has_limited_features" />
        <select name="is_popular">
            <option value="popular">kdflahe</option>
            <option value="popular">kdfla</option>
            <option value="popular">kdfla</option>
            <option value="popular">kdfla</option>
            <option value="popular">kdfla</option>
        </select>
        <button type="submit">submit</button>
    </form>
@endsection