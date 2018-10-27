@extends('layouts.helloapp')

@section('title', 'ユーザー認証')

@section('menubar')
  @parent
  ユーザー認証
@endsection

@section('content')
  <p>{{ $message }}</p>
  <form action="/public/hello/auth" method="post">
    {{ csrf_field() }}
    <tr>
      <th>email:</th>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <th>pass:</th>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="send"></td>
    </tr>
  </form>
@endsection

@section('footer')
  <p>copyright 2018</p>
@endsection
