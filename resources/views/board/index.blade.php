@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
  @parent
  ボード・ページ
@endsection

@section('content')
  <table>
    <tr>
      <td>Data</td>
    </tr>
    @foreach($items as $item)
      <tr>
        <td>{{$item -> getData()}}</td>
      </tr>
    @endforeach
  </table>
@endsection

@section('footer')
  copylight 2018
@endsection