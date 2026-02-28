@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="1">
    <div class="2">
        <h2 class="3">商品一覧</h2>
        <div class="4">
           <a class="5" href="/products/register">+ 商品を追加</a>
        </div>
    </div>
    <form   class="search" action="/products/search" method="get">
        <div class="7">
            <input class="search__keyword-input" type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
            <div class="search__button">
               <button class="search__button-submit" type="submit">検索</button>
            </div>
        </div>
        <div>
            <h3>価格順で表示</h3> 
            <select  class="search__item-select" name="sort" onchange="this.form.submit()"> 
                <option value="" disabled selected>価格で並び替え</option>
                <option value = "price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>価格が安い順</option> 
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>価格が高い順</option>
            </select>
            @if(request('sort'))
            <div class="sort-badge">
                <span>
                    {{ request('sort') == 'price_asc' ? '価格が安い順' : '価格が高い順' }}
                </span>

                <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}">
                    ×
                 </a>
            </div>
            @endif           
        </div>
        <div class="product-list">
            @foreach ($products as $product)
            <a class="5" href="{{ url('/products/detail/' . $product->id) }}"> 
              <div class="card">
                   <img src="{{ asset('storage/' . $product->image) }}" alt=""> 
                   <div>
                       <p>{{$product->name}}</p>
                       <span>¥{{$product->price}}</span>
                   </div>               
              </div>
            </a>
            @endforeach
        </div>
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </form>        
</div>
@endsection