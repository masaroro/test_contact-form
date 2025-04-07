@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>
        <form class="form" action="/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--name">
                        <div class="form__input--name-item">
                            <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}"/>
                        </div>
                        <div class="form__input--name-item">
                            <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}"/>
                        </div>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--radio">
                        <div class="form__input--radio-item">
                            <input type="radio" name="gender" value="男性" @if(old('gender') == 'male' || empty(old('gender'))) checked @endif/>
                            <label for="male">男性</label>
                        </div>
                        <div class="form__input--radio-item">
                            <input type="radio" name="gender" value="女性" @if(old('gender') == 'female') checked @endif/>
                            <label for="female">女性</label>
                        </div>
                        <div class="form__input--radio-item">
                            <input type="radio" name="gender" value="その他" @if(old('gender') == 'other') checked @endif/>
                            <label for="other">その他</label>
                        </div>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}"/>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--tel">
                        <div class="form__input--tel-item">
                            <input type="tel" name="tel_first" placeholder="080" value="{{ old('tel_first') }}"/>
                        </div>
                        <span class="form__input--tel-hyphen">-</span>
                        <div class="form__input--tel-item">
                            <input type="tel" name="tel_second" placeholder="1234" value="{{ old('tel_second') }}"/>
                        </div>
                        <span class="form__input--tel-hyphen">-</span>
                        <div class="form__input--tel-item">
                            <input type="tel" name="tel_third" placeholder="5678" value="{{ old('tel_third') }}"/>
                        </div>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}"/>
                    </div>
                    <div class="form__error">
                        <!-- スペースの観点から仮置き -->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <select class="form__item-select" name="category_id">
                            <option value="1">
                                選択して下さい。
                            </option>
                            @foreach($categories as $category)
                            <option value="{{$category['id']}}">
                            {{$category['name']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection('content')
