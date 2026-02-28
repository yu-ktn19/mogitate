@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="1">
    <form action="" enctype="multipart/form-data">
        @csrf
        <div>
            <h1>商品登録</h1>
        </div>
        <div>
            <p>商品名<span>必須</span></p>
            <input type="text" placeholder="商品名を入力">
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>値段<span>必須</span></p>
            <input type="text" placeholder="値段を入力">
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <img src="{{ asset($fruit->image) }}" width="300">
            <input type="file" name="image" accept="image/png, image/jpeg" />
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>季節<span>必須</span></p>
            <p>複数選択可</p>
            <input type="text" placeholder="値段を入力">
        </div> 
        <div>
            <label class="form__label">
              <input class="form__input"  type="checkbox"  value="1" >
              <span class="form__text">春</span>
            </label>
            <label class="form__label">
              <input class="form__input"  type="checkbox"  value="2" >
              <span class="form__text">夏</span>
            </label>
            <label class="form__label">
              <input class="form__input"  type="checkbox"  value="3" >
              <span class="form__text">秋</span>
            </label>
            <label class="form__label">
              <input class="form__input"  type="checkbox"  value="4" >
              <span class="form__text">冬</span>
            </label>
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>商品説明 <span>必須</span></p>
            <textarea class="textarea" name="detail" placeholder="商品の説明を入力"></textarea>
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div class="btn-inner">
            <input class="back-btn" type="submit" value="戻る" name="back">
            <input class="send-btn btn" type="submit" value="登録" name="send">      
        </div>
    </form>
</div>
@endsection