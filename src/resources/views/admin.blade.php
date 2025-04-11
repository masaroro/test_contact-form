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
    <div class="admin__content">
        <div class="admin__heading">
            <h2>Admin</h2>
        </div>
        <form class="search-form" action="/admin/search" method="get">
            @csrf
            <div Class="search-form__item">
                <input class="search-form__item-text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}" >
                <select class="search-form__item-gender" name="gender">
                    <option value="">性別</option>
                    <option value="all">全て</option>
                    <option name="gender" value="1">男性</option>
                    <option name="gender" value="2">女性</option>
                    <option name="gender" value="3">その他</option>
                </select>
                <select class="search-form__item-category" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">
                            {{$category['name']}}
                        </option>
                    @endforeach
                </select>
                <input class="search-form__item-date" type="date" name="date" value="{{ old('date') }}">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
                <button class="search-form__button-reset" type="reset">リセット</button>
            </div>
        </form>
        <div class="admin__utilities">
            <div class="admin__utilities-item">
                <button class="admin__utilities-button">エクスポート</button>
            </div>
            <div class="admin__utilities-pagination">
                {{ $contacts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
        <div class="contact-table">
            <table class="contact-table__inner">
                <tr class="contact-table__row">
                    <th class="contact-table__header">
                        <span class="contact-table__header-span">お名前</span>
                        <span class="contact-table__header-span">性別</span>
                        <span class="contact-table__header-span">メールアドレス</span>
                        <span class="contact-table__header-span">お問い合わせの種類</span>
                        <span class="contact-table__header-span"></span>
                    </th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="contact-table__row">
                    <td class="contact-table__item">
                        <form class="contact-form" action="/" method="post">
                            @csrf
                            <input class="contact-form__item-input" type="hidden" name="id" value="{{ $contact['id'] }}">
                            <div class="contact-form__item">
                                {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
                            </div>
                            <div class="contact-form__item">
                                @if($contact['gender'] == 1)
                                    男性
                                @elseif($contact['gender'] == 2)
                                    女性
                                @else
                                    その他
                                @endif
                            </div>
                            <div class="contact-form__item">
                                {{ $contact['email'] }}
                            </div>
                            <div class="contact-form__item">
                                {{ $contact['category']['name'] }}
                            </div>
                            <div class="contact-form__button">
                                <button class="contact-form__button-submit" type="submit">詳細</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection