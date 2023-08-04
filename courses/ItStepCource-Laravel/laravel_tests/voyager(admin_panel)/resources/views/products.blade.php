{{-- Макеты страницы --}}
@extends('app_layout')


{{-- Содержания страницы --}}
@section('content')


<hr>
<h1>
    @php
        echo getcwd();
    @endphp
</h1>

<h3>Таблица Продуктов (Blade):</h3>
    <table class="table table-bordered table-sm table-hover">
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Price</th>
            <th>Rate</th>
            <th>Image</th>
        </tr>
        @foreach ($products_array as $product)
            @if ($product->publish==1)
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->rate}}</td>
                <td> <img src="http://localhost/voyager/public/storage/{{$product->image}}" height="50px"> </td>
            @else
                @continue
            @endif
        @endforeach

    </table>
