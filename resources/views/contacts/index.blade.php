@php
    $title = 'お問い合わせ';
@endphp

@extends('layout')

@section('content')
    <h1 class="text-center mt-2 mb-5">お問い合わせ</h1>
    <div class="container">

{{--        Formファサードを使ってフォームを作成--}}

        {!! Form::open(['route' => 'confirm', 'method' => 'POST', 'enctype' => 'multipart/form-data','id' => 'form']) !!}
        {{ csrf_field() }}

        <div class="form-group row">
            <p class="col-sm-4 col-form-label">お名前（10文字以内）<span class="badge badge-danger ml-1">必須</span></p>
            <div class="col-sm-8">
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('name'))
            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
        @endif

        <div class="form-group row">
            <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
            <div class="col-sm-8">
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('email'))
            <p class="alert alert-danger">{{ $errors->first('email') }}</p>
        @endif

        <div class="form-group row">
            <p class="col-sm-4 col-form-label">電話番号</p>
            <div class="col-sm-8">
                {{ Form::text('tel', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('tel'))
            <p class="alert alert-danger">{{ $errors->first('tel') }}</p>
        @endif

        <div class="form-group row">
            <p class="col-sm-4 col-form-label">性別<span class="badge badge-danger ml-1">必須</span></p>
            <div class="col-sm-8" id="radio">
                <label>{{ Form::radio('gender', "男性", true) }}男性</label>
                <label>{{ Form::radio('gender', "女性") }}女性</label>
                <label>{{ Form::radio('gender', "その他") }}その他</label>
                <label>{{ Form::radio('gender', "無回答") }}無回答</label>
            </div>
        </div>
        @if ($errors->has('gender'))
            <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
        @endif

        <div class="form-group row">
            <p class="col-sm-4 col-form-label">画像</p>
            <div class="col-sm-8">
                {{ Form::file('image', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('image'))
            <p class="alert alert-danger">{{ $errors->first('image') }}</p>
        @endif

        <div class="form-group row">
            <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="badge badge-danger ml-1">必須</span></p>
            <div class="col-sm-8">
                {{ Form::textarea('contents', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('contents'))
            <p class="alert alert-danger">{{ $errors->first('contents') }}</p>
        @endif

        <div class="text-center">
            {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary']) }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
