@extends('layouts.app')

@section('page-title')
<title>Advance Test-送信完了</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<main class="content">
    <div class="content-inner">
        <p class="content__thanks-message">
            ご意見いただきありがとうございました。
        </p>
        <div class="content__button">
            <a href="" class="content__button-toppage">トップページへ</a>
        </div>
    </div>
</main>
@endsection