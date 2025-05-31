@extends('layouts.app')

@section('content')
    <h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Создать заказ</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Дата создания</th>
            <th>Покупатель</th>
            <th>Статус</th>
            <th>Итоговая цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->status == 'new' ? 'Новый' : 'Выполнен' }}</td>
                <td>{{ number_format($order->total_price, 2) }} ₽</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">Просмотр</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
