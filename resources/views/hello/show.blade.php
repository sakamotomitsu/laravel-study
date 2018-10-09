@extends('layouts.helloapp')

@section('title', 'show')

@section('menubar')
  @parent
  詳細ページ
@endsection

@section('content')

  @if( $items != null )
  <table>
    @foreach( $items as $item )
    <tr>
      <th>id:</th>
      <td>{{$item -> id}}</td>
    </tr>
    <tr>
      <th>name:</th>
      <td>{{$item -> name}}</td>
    </tr>
    <tr>
      <th>age:</th>
      <td>{{$item -> age}}</td>
    </tr>
    @endforeach
  </table>
  @endif

@endsection

@section('footer')
  <p>copyright 2018</p>
@endsection