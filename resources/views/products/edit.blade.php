@extends('layouts.app')

@section('content')
    <h1>{{ isset($product) ? 'Редактирование товара' : 'Создание товара' }}</h1>

    <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
