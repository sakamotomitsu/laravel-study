@extends('layouts.helloapp')

@section('title', 'Board.add')

@section('menubar')
  @parent
  投稿ページ
@endsection

@section('content')
  @if( count($errors) > 0 )
    <div>
      <ul>
        @foreach( $errors -> all() as $error )
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <table>
    <form action="/public/board/add" method="post">
      {{ csrf_field() }}
      <tr>
        <th>person id:</th>
        <td><input type="number" name="person_id"></td>
      </tr>
      <tr>
        <th>title:</th>
        <td><input type="text" name="title"></td>
      </tr>
      <tr>
        <th>message:</th>
        <td><input type="text" name="message"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
      </tr>
    </form>
  </table>
@endsection

@section('footer')
  copylight 2018
@endsection
