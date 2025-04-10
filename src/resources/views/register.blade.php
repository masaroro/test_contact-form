@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
    <div class="header-utilities">
        <a class="header__logo" href="/">
            FashionablyLate
        </a>
        <nav>
            <ul class="header-nav">
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/login">login</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="register__content">
        <div class="register__heading">
            <h2>Register</h2>
        </div>
        <form class="register-form" action="/register" method="post">
            @csrf
            <div class="register-form__item">
                <div class="register-form__title">
                    <span>お名前</span>
                </div>
                <div class="register-form__item-input">
                    <input type="text" name="name" placeholder="例:山田 太郎" value="{{ old('name') }}"/>
                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="register-form__item">
                <div class="register-form__title">
                    <span>メールアドレス</span>
                </div>
                <div class="register-form__item-input">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="register-form__item">
                <div class="register-form__title">
                    <span>パスワード</span>
                </div>
                <div class="register-form__item-input">
                    <input type="password" name="password" placeholder="例:coachtech1106" value=""/>
                    @error('password')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="register-form__button">
                <button class="register-form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection