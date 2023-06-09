@extends('layouts.app')

@section('page-title')
<title>Advance Test-お問い合わせフォーム</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header-inner">
        <h1 class="header-title">お問い合わせ</h1>
    </div>
</header>
<main class="content">
    <div class="content-inner">
        <form action="/contacts/confirm" method="post" class="contact-form h-adr">
            @csrf
            <span class="p-country-name" style="display:none;">Japan</span>
            <table class="contact-table">
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title">お名前</p>
                    </th>
                    <td class="contact-table__input">
                        <div class="contact-table__input-inner">
                            <div class="contact-table__left">
                                <input type="text" name="sei" class="contact-form__textbox sei-error" value="{{ old('sei') }}" required maxlength="255" >
                                <div class="error-message">
                                    @error('sei')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <p class="input__example">例）山田</p>
                            </div>
                            <div class="contact-table__right">
                                <input type="text" name="mei" class="contact-form__textbox mei-error" value="{{ old('mei') }}" required maxlength="255">
                                <div class="error-message">
                                    @error('mei')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <p class="input__example">例）太郎</p>
                            </div>
                            <input type="hidden" name="fullname">
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title">性別</p>
                    </th>
                    <td class="contact-table__input">
                        <div class="contact-table__input-inner">
                            <input type="radio" id="male" name="gender" value=1 class="contact-form__gender" checked>
                            <label for="male" class="contact-form__gender--label">男性</label>
                            <input type="radio" id="female" name="gender" value=2 class="contact-form__gender">
                            <label for="female" class="contact-form__gender--label">女性</label>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title">メールアドレス</p>
                    </th>
                    <td class="contact-table__input">
                        <input type="email" name="email" class="contact-form__textbox email-error" value="{{ old('email') }}" required maxlength="255">
                        <div class="error-message">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                        <p class="input__example">例）test@example.com</p>
                    </td>
                </tr>
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title">郵便番号</p>
                    </th>
                    <td class="contact-table__input">
                        <span class="postcode-sign">〒</span>
                        <input type="text" name="postcode"  onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" class="contact-form__postcode postcode-error p-postal-code" value="{{ old('postcode') }}" required pattern="/[0-9]{3}-[0-9]{4})/" minlength="8" maxlength="8" onInput="return hankaku()">
                        <div class="error-message">
                            @error('postcode')
                            {{ $message }}
                            @enderror
                        </div>
                        <p class="input__example">例）123-4567</p>
                    </td>
                </tr>
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title">住所</p>
                    </th>
                    <td class="contact-table__input">
                        <input type="text" name="address" class="contact-form__textbox address-error p-region p-locality p-street-address p-extended-address" value="{{ old('address') }}" maxlength="255">
                        <div class="error-message">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                        <p class="input__example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                    </td>
                </tr>
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title-building">建物名</p>
                    </th>
                    <td class="contact-table__input">
                        <input type="text" name="building_name" class="contact-form__textbox building_name-error" value="{{ old('building_name') }}" maxlength="255">
                        <div class="error-message">
                            @error('building_name')
                            {{ $message }}
                            @enderror
                        </div>
                        <p class="input__example">例）千駄ヶ谷マンション101</p>
                    </td>
                </tr>
                <tr class="contact-table__item">
                    <th class="contact-table__header">
                        <p class="contact-form__title">ご意見</p>
                    </th>
                    <td class="contact-table__input">
                        <textarea name="opinion" cols="25" rows="5" class="contact-form__opinion opinion-error" maxlength="120">{{ old('opinion') }}</textarea>
                        <div class="error-message">
                            @error('opinion')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
            </table>
            <div class="contact-form__button">
                <button class="contact-form__button-confirm">確認</button>
            </div>
        </form>
    </div>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script>
    function checkInput(event) {
        var input = event.target; 
        var errorMessage = input.nextElementSibling; 

        // 入力フォームの値が空でない場合、エラーメッセージを非表示にする
        if (input.value !== '') {
            errorMessage.style.display = 'none';
        } else {
            errorMessage.style.display = 'block'; 
        }
    }

    // 全ての入力フォームに対してイベントリスナーを追加する
    var inputs = document.querySelectorAll('.contact-form__textbox');
    inputs.forEach(function (input) {
        input.addEventListener('input', checkInput);
    });
</script>
</main>
@endsection