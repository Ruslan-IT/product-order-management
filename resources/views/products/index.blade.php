@extends('layouts.app')

@section('content')
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить товар</a>

    <table class="table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ number_format($product->price, 2) }} ₽</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Просмотр</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
