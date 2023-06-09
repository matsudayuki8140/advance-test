@extends('layouts.app')

@section('page-title')
<title>Advance Test-内容確認</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header-inner">
        <h1 class="header-title">内容確認</h1>
    </div>
</header>
<main class="content">
    <div class="content-inner">
        <form action="/contacts" method="post" class="confirm-form">
            @csrf
            <table class="confirm-table">
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">お名前</p>
                    </th>
                    <td class="confirm-table__data">
                        <div class="confirm-table__data-inner">
                            <span class="confirm-form__input">{{ $contact['sei'] }}</span>
                            <span class="confirm-form__input">{{ $contact['mei'] }}</span>
                            <input type="hidden" name='sei' value="{{ $contact['sei'] }}">
                            <input type="hidden" name='mei' value="{{ $contact['mei'] }}">
                            <input type="hidden" name="fullname" value="{{ $contact['fullname'] }}">
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">性別</p>
                    </th>
                    <td class="confirm-table__data">
                        @if($contact['gender'] == 1)
                        <p class="confirm-form__data">男性</p>
                        @else
                        <p class="confirm-form__data">女性</p>
                        @endif
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">メールアドレス</p>
                    </th>
                    <td class="confirm-table__data">
                        <p class="confirm-form__input">{{ $contact['email'] }}</p>
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">郵便番号</p>
                    </th>
                    <td class="confirm-table__data">
                        <p class="confirm-form__input">{{ $contact['postcode'] }}</p>
                        <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">住所</p>
                    </th>
                    <td class="confirm-table__data">
                        <p class="confirm-form__input">{{ $contact['address'] }}</p>
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">建物名</p>
                    </th>
                    <td class="confirm-table__data">
                        <p class="confirm-form__input">{{ $contact['building_name'] }}</p>
                        <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__item">
                    <th class="confirm-table__header">
                        <p class="confirm-form__title">ご意見</p>
                    </th>
                    <td class="confirm-table__data">
                        <p class="confirm-form__input">{{ $contact['opinion'] }}</p>
                        <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">
                    </td>
                </tr>
            </table>
            <div class="confirm-form__button">
                <button class="confirm-form__button-submit">送信</button>
                <button type="button" onclick="history.back(-1)" class="redirect__to-contact">修正する</button>
            </div>
        </form>
    </div>
</main>
@endsection