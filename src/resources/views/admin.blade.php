@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('header')
    <div class="header-utilities">
        <a class="header__logo" href="/">
            FashionablyLate
        </a>
        <nav>
            <ul class="header-nav">
                <li class="header-nav__item">
                    <form class="header-nav__button" action="/logout" method="post">
                        @csrf
                        <button class="header-nav__button-submit" type="submit">logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="todo__content">
        <div class="login__heading">
            <h2>Admin</h2>
        </div>
        <form class="search-from" action="/todos/search" method="get">
            @csrf
            <div Class="search-from__item">
                <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}" >
                <select class="search-form__item-select" name="category_id">
                    <option value="">カテゴリ</option>
                </select>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
        <div class="todo-table">
            <table class="todo-table__inner">
                <tr class="todo-table__row">
                    <th class="todo-table__header">
                        <span class="todo-table__header-span">お名前</span>
                        <span class="todo-table__header-span">性別</span>
                        <span class="todo-table__header-span">メールアドレス</span>
                        <span class="todo-table__header-span">お問い合わせの種類</span>
                        <span class="todo-table__header-span"></span>
                    </th>
                </tr>

                <tr class="todo-table__row">
                    <td class="todo-table__item">
                        <form class="update-form" action="/todos/update" method="post">
                            @csrf
                            <div class="update-form__item">
                                <input class="update-form__item-input" type="text" name="content" value="">
                                <input type="hidden" name="id" value="">
                            </div>
                            <div class="update-form__item">
                                <p class="update-form__item-p">ここは記載</p>
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button-submit" type="submit">更新</button>
                            </div>
                        </form>
                    </td>
                    <td class="todo-table__item">
                    </td>
                </tr>

            </table>
        </div>
    </div>
@endsection