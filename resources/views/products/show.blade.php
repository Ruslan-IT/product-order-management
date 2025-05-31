@extends('layouts.app')

@section('content')
    <h1>Информация о товаре</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Категория:</strong> {{ $product->category->name }}</p>
            <p class="card-text"><strong>Цена:</strong> {{ number_format($product->price, 2) }} ₽</p>
            <p class="card-text"><strong>Описание:</strong> {{ $product->description }}</p>

            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
@endsection
