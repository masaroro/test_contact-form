@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('header')
    <div class="header-utilities">
        <a class="header__logo" href="/">
            FashionablyLate
        </a>
        <nav>
            <ul class="header-nav">
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/register">register</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="login__content">
        <div class="login__heading">
            <h2>Login</h2>
        </div>
        <form class="login-form" action="/login" method="post">
            @csrf
            <div class="login-form__item">
                <div class="login-form__title">
                    <span>メールアドレス</span>
                </div>
                <div class="login-form__item-input">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}"/>
                    <div class="error">
                    @error('email')
                            {{ $message }}
                    @enderror
                    </div>
                </div>
            </div>
            <div class="login-form__item">
                <div class="login-form__title">
                    <span>パスワード</span>
                </div>
                <div class="login-form__item-input">
                    <input type="password" name="password" placeholder="例:coachtech1106" value=""/>
                    <div class="error">
                    @error('password')
                            {{ $message }}
                    @enderror
                    </div>
                </div>
            </div>
            <div class="login-form__button">
                <button class="login-form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection