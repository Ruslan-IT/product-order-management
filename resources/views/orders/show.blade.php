@extends('layouts.app')

@section('content')
    <h1>Информация о заказе #{{ $order->id }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ФИО покупателя:</strong> {{ $order->customer_name }}</p>
            <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <p><strong>Статус:</strong> {{ $order->status == 'new' ? 'Новый' : 'Выполнен' }}</p>
            <p><strong>Товар:</strong> {{ $order->product->name }}</p>
            <p><strong>Количество:</strong> {{ $order->quantity }}</p>
            <p><strong>Цена за единицу:</strong> {{ number_format($order->product->price, 2) }} ₽</p>
            <p><strong>Итоговая цена:</strong> {{ number_format($order->total_price, 2) }} ₽</p>
            <p><strong>Комментарий:</strong> {{ $order->comment }}</p>

            @if($order->status == 'new')
                <form action="{{ route('orders.complete', $order) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Отметить как выполненный</button>
                </form>
            @endif

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Назад к списку</a>
        </div>
    </div>
@endsection
