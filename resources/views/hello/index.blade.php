@extends('layouts.helloapp')
<style>
  .pagination {font-size: 10pt;}
  .pagination li {display: inline-block;}
  tr th a:link {color: white;}
  tr th a:visited {color: white;}
  tr th a:hover {color: white;}
  tr th a:active {color: white;}
</style>

@section('title', 'Index')

@section('menubar')
  @parent
@endsection

@section('content')
  @if(Auth::check())
    <p>USER:{{ $user -> name.'('.$user -> email .')' }}</p>
  @else
    <p>※ログインしていません(<a href="/public/login">ログイン</a>|<a href="/public/regster">登録</a>)</p>
  @endif

  <table>
    <tr>
      <th><a href="/public/hello?sort=name">name</a></th>
      <th><a href="/public/hello?sort=mail">mail</a></th>
      <th><a href="/public/hello?sort=age">age</a></th>
    </tr>
    @foreach( $items as $item )
      <tr>
        <td>{{$item -> name}}</td>
        <td>{{$item -> mail}}</td>
        <td>{{$item -> age}}</td>
      </tr>
    @endforeach
  </table>

  {{ $items -> appends(['sort' => $sort]) -> links() }}

@endsection

@section('footer')
  <p>copyright 2018</p>
@endsection
