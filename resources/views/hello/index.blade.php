@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
@endsection

@section('content')

  <table>
    <tr>
      <th>name</th>
      <th>mail</th>
      <th>age</th>
    </tr>
    @foreach( $items as $item )
      <tr>
        <td>{{$item -> name}}</td>
        <td>{{$item -> mail}}</td>
        <td>{{$item -> age}}</td>
      </tr>
    @endforeach
  </table>

@endsection

@section('footer')
  <p>copyright 2018</p>
@endsection
