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
                            <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name', $contact['first_name'] ?? '') }}"/>
                        </div>
                        <div class="form__input--name-item">
                            <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name', $contact['last_name'] ?? '') }}"/>
                        </div>
                    </div>
                    <div class="form__error">
                        @if ($errors->has('first_name'))
                            {{ $errors->first('first_name') }}
                        @elseif ($errors->has('last_name'))
                            {{ $errors->first('last_name') }}
                        @endif
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
                            <input type="radio" name="gender" value="1" {{ old('gender', $contact['gender'] ?? '1') == '1' ? 'checked' : '' }}/>
                            <label for="male">男性</label>
                        </div>
                        <div class="form__input--radio-item">
                            <input type="radio" name="gender" value="2" {{ old('gender', $contact['gender'] ?? '') == '2' ? 'checked' : '' }}/>
                            <label for="female">女性</label>
                        </div>
                        <div class="form__input--radio-item">
                            <input type="radio" name="gender" value="3" {{ old('gender', $contact['gender'] ?? '') == '3' ? 'checked' : '' }}/>
                            <label for="other">その他</label>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
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
                        <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email',$contact['email'] ?? '') }}"/>
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $errors->first('email') }}
                        @enderror
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
                        <!-- <div class="form__input--tel-item"> -->
                            <input type="tel" name="tel_first" placeholder="080" value="{{ old('tel_first',$contact['tel_first'] ?? '') }}"/>
                        <!-- </div> -->
                        <span class="form__input--tel-hyphen">-</span>
                        <!-- <div class="form__input--tel-item"> -->
                            <input type="tel" name="tel_second" placeholder="1234" value="{{ old('tel_second',$contact['tel_second'] ?? '') }}"/>
                        <!-- </div> -->
                        <span class="form__input--tel-hyphen">-</span>
                        <!-- <div class="form__input--tel-item"> -->
                            <input type="tel" name="tel_third" placeholder="5678" value="{{ old('tel_third',$contact['tel_third'] ?? '') }}"/>
                        <!-- </div> -->
                    </div>
                    <div class="form__error">
                        @if ($errors->has('tel'))
                            {{ $errors->first('tel') }}
                        @elseif ($errors->has('tel_first'))
                            {{ $errors->first('tel_first') }}
                        @elseif ($errors->has('tel_second'))
                            {{ $errors->first('tel_second') }}
                        @elseif ($errors->has('tel_third'))
                            {{ $errors->first('tel_third') }}
                        @endif
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
                        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address'] ?? '') }}"/>
                    </div>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building',$contact['building'] ?? '') }}"/>
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
                            <option value="">
                                選択して下さい。
                            </option>
                            @foreach($categories as $category)
                            <option value="{{$category['id']}}" {{ old('category_id',$contact['category_id'] ?? '') == $category->id ? 'selected' : '' }}>
                            {{$category['name']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
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
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail',$contact['detail'] ?? '') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('deail')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection('content')
