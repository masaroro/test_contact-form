@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('header')
    <a class="header__logo" href="/">
        FashionablyLate
    </a>
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="{{ route('handle.confirm.action') }}" method="post">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            <div class="confirm-table__text-name">
                                <input type="text" name="name" value="{{$contact['first_name']}} {{$contact['first_name']}}" readonly />
                                <input type="hidden" name="first_name" value="{{$contact['first_name']}}" readonly />
                                <input type="hidden" name="last_name" value="{{$contact['last_name']}}" readonly />
                            </div>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <input type="text" name="gender-select" value="{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : ($contact['gender'] == 3 ? 'その他': '不明')) }}" readonly />
                            <input type="hidden" name="gender" value="{{$contact['gender']}}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <input type="email" name="email" value="{{$contact['email']}}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"></th>
                        <td class="confirm-table__text">
                            <input type="tel" name="tel" value="{{$contact['tel']}}" readonly />
                            <input type="hidden" name="tel_first" value="{{$contact['tel_first']}}" readonly />
                            <input type="hidden" name="tel_second" value="{{$contact['tel_second']}}" readonly />
                            <input type="hidden" name="tel_third" value="{{$contact['tel_third']}}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"></th>
                        <td class="confirm-table__text">
                            <input type="text" name="address" value="{{$contact['address']}}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"></th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value="{{$contact['building']}}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"></th>
                        <td class="confirm-table__text">
                            <input type="text" name="category_name" value="{{$categories->where('id', $contact['category_id'])->first()->name}}" readonly />
                            <input type="hidden" name="category_id" value="{{$contact['category_id']}}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"></th>
                        <td class="confirm-table__text">
                            <input type="text" name="detail" value="{{$contact['detail']}}" readonly />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit" name="submit_action" value="send">送信</button>
                <button class="form__button-submit-edit" type="submit" name="submit_action" value="edit">修正</button>
            </div>
        </form>
    </div>
@endsection