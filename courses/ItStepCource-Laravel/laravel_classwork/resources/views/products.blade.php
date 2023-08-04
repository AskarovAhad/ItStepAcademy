
{{-- Макеты страницы --}}
@extends('app_layout')


{{-- Содержания страницы --}}
@section('content')

<h4> Пользователь:
    @auth
        {{-- Пользователь аутентифицирован ... --}}
        {{ Auth::user()->name }}

        <a class="" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    @endauth
    @guest
        {{-- Пользователь не аутентифицирован ... --}}
        [гость]
        {{-- Login page /login --}}
        <a class="" href="{{ route('login') }}">Login</a>

        {{-- Register page /register --}}
        <a class="" href="{{ route('register') }}">Register</a>
    @endguest
</h4>

<hr>


<h3>Таблица Продуктов (Blade):</h3>
    <table class="table table-bordered table-sm table-hover">
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Price Sum</th>
            <th>Price USD</th>
            <th>Price Ruble</th>
            <th>Rate</th>
        </tr>
        {{-- Цикл отображения студентов  --}}
        @foreach ($products_array as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td> {{-- Sum --}}
            {{-- USD --}}
            <td>{{$product->price_usd}}
                <!-- Редактирования Цены в USD  -->
                USD
                <form action="http://localhost/laravel_classwork/public/product_save" method="post" style="display: inline-block; ">
                    @csrf
                    <input type="text" name="price_usd" size="5">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="submit" value="save">
                </form>
            </td>
            <td>{{$product->price_ruble}}</td> {{-- Ruble --}}
            <td>{{$product->rate}}</td>
        </tr>
        @endforeach

    </table>




<!-- Добавления нового продукта -->
<h3 class="mt-5" > New Pruduct Form  </h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Auth::check() and Auth::user()->is_admin == 1)
    <form action="" method="post">
        @csrf
        Name: <input class="mb-2" type="text" name="name" value="{{ old('name') }}">
        <br>
        Price: <input class="mb-2" type="text" name="price" value="{{ old('price') }}">
        <br>
        Rate: <input class="mb-2" type="text" name="rate" value="{{ old('rate') }}">
        <br>
        <input class="btn btn-primary mt-2" type="submit" value="Send">
        <input type="hidden" name="action" value="insert">
    </form>

@else
    <h4  class="text-danger">Only Admin can add new product</h4>
@endif



@endsection
