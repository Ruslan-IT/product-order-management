@extends('layouts.app')

@section('content')
<h1>Создание заказа</h1>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="customer_name" class="form-label">ФИО покупателя</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
    </div>

    <div class="mb-3">
        <label for="created_at" class="form-label">Дата создания</label>
        <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
    </div>

    <div class="mb-3">
        <label for="product_id" class="form-label">Товар</label>
        <select class="form-select" id="product_id" name="product_id" required>
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }} ({{ number_format($product->price, 2) }} ₽)</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Количество</label>
        <input type="number" min="1" class="form-control" id="quantity" name="quantity" value="1" required>
    </div>

    <div class="mb-3">
        <label for="comment" class="form-label">Комментарий</label>
        <textarea class="form-control" id="comment" name="comment"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Создать заказ</button>
</form>
@endsection
