@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

@section('content')
<div class="1">
    <form method="POST"
      action="/products/{{productId}}/update" >
      @method('PATCH')
        @csrf
        <div>
            <p>商品一覧<span>&gt;{{ old('name', $fruit->name) }}</span></p>
        </div>
        <div>
            <img src="{{ asset('storage/' . $fruit->image) }}" width="300">
            <input type="file" name="image" accept="image/png, image/jpeg" />
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>商品名</p>
            <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $fruit->name) }}">
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>値段</p>
            <input type="text" name="price" placeholder="値段を入力" value="{{ old('price', $fruit->price) }}">
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>季節</p>
        </div> 
        <div>
        @foreach ($seasons as $season)
        <label>
            <input type="checkbox"
               name="seasons[]"
               value="{{ $season->id }}"
               {{ in_array($season->id, old('seasons', $fruit->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
               {{ $season->name }}
        </label>
        @endforeach
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div>
            <p>商品説明</p>
            <textarea class="textarea" name="description" placeholder="商品の説明を入力">{{ old('description', $fruit->description) }}</textarea>
        </div>
        <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
        </div>
        <div class="btn-inner">
            <input class="back-btn" type="submit" value="戻る" name="back">
            <input class="send-btn btn" type="submit" value="変更を保存" name="send">
        </div>
    </form>
    <form class="update-form" action="/products/{productId}/delete" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="delete-btn">
            🗑
        </button>        
    </form>      
</div>
@endsection