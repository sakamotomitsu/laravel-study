@extends('layouts.helloapp')

@section('title', 'Board.add')

@section('menubar')
  @parent
  投稿ページ
@endsection

@section('content')
  <table>
    <form action="/public/person/add" method="post">
      <tr>
        <th>person id;</th>
        <td><input type="number" name="person_id"></td>
      </tr>
      <tr>
        <th>title:</th>
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
