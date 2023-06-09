@extends('layouts.app')

@section('page-title')
<title>Advance Test-管理システム</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header-inner">
        <h1 class="header-title">管理システム</h1>
    </div>
</header>
<main class="content">
    <div class="search">
        <div class="search-inner">
            <form action="/manage/search" method="get" class="search-form">
                @csrf
                <div class="search-form__row1">
                    <span class="search-form__title">お名前</span>
                    <input type="text" name="name" class="search-form__input">
                    <span class="search-form__title-gender">性別</span>
                    <input type="radio" value="0" id="all" name="gender" class="search-form__input-gender" checked>
                    <label for="all" class="search-form__input-label">全て</label>
                    <input type="radio" value=1 id="male" name="gender" class="search-form__input-gender">
                    <label for="male" class="search-form__input-label">男性</label>
                    <input type="radio" value=2 id="female" name="gender" class="search-form__input-gender">
                    <label for="female" class="search-form__input-label">女性</label>
                </div>
                <div class="search-form__row2">
                    <span class="search-form__title">登録日</span>
                    <input type="datetime-local" name="date_first" class="search-form__input">
                    <span class="input-decorate">～</span>
                    <input type="datetime-local" name="date_last" class="search-form__input">
                </div>
                <div class="search-form__row3">
                    <span class="search-form__title">メールアドレス</span>
                    <input type="text" name="email" class="search-form__input">
                </div>
                <div class="search-form__row4">
                    <button class="search-form__button">検索</button>
                    <a href="/manage" class="search-form__reset">リセット</a>
                </div>
            </form>
        </div>
    </div>
    <div class="contact-list">
        <div class="contact-list__inner">
            <div class="list-information">
                {{ $contacts->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
            <table class="contact-table">
                <tr class="contact-list__title">
                    <th class="contact-list__title--id">ID</th>
                    <th class="contact-list__title--fullname">お名前</th>
                    <th class="contact-list__title--gender">性別</th>
                    <th class="contact-list__title--email">メールアドレス</th>
                    <th class="contact-list__title--opinion">ご意見</th>
                    <th class="contact-list__title--delete"></th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="contact-list__row">
                    <div class="contact-list__item">
                        <td class="contact-list__item--id">{{ $contact['id'] }}</td>
                        <td class="contact-list__item--fullname">{{ $contact['fullname'] }}</td>
                        @if($contact['gender'] == 1)
                        <td class="contact-list__item--gender">男性</td>
                        @else
                        <td class="contact-list__item--gender">女性</td>
                        @endif
                        <td class="contact-list__item--email">{{ $contact['email'] }}</td>
                        <td class="contact-list__item--opinion">{{ $contact['opinion'] }}</td>
                        <td class="contact-list__item--delete">
                            <form action="/manage/delete" method="post" class="delete-form">
                                @method('DELETE')
                                @csrf
                                <div class="delete-button">
                                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                    <button class="delete-button__submit">削除</button>
                                </div>
                            </form>
                        </td>
                    </div>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</main>
@endsection
