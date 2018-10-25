<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Validator;


/*  global $head, $style, $body, $end;
  $head = '<html><head>';
  $style = <<<EOF
<style>
body{ font-size: 16pt; color: #999; }
h1{ font-size: 100pt; text-align:right; color: #eee; margin: -40px 0 -50px 0; }
</style>
EOF;
  $body = '</head><body>';
  $end = '</body></html>';
  
  function tag( $tag, $txt ){
    return "<{$tag}>".$txt."</{$tag}>";
  }*/


class HelloController extends Controller
{
    //
/*  public function index(){
    global $head, $style, $body, $end;

    $html = $head.tag( 'title','Hello/Index' ).$style.$body.tag( 'h1','Index' ).tag( 'p','this is Index page' ).'<a href="/public/hello/other">go to other page</a>'.$end;

    return $html;
  }
  
  public function other(){
    global $head, $style, $body, $end;
    
    $html = $head.tag( 'title','Hello/other' ).$style.$body.tag( 'h1','other' ).tag( 'p','this is other page' ).$end;
    
    return $html;
  }*/
  
  //シングルコントローラー
/*  public function __invoke(){
    
    return <<<EOF
<thml>
<head>
<title>Hello</title>
<style>
body{ font-size: 16pt; color: #999; }
h1{ font-size: 100pt; text-align:right; color:#eee; margin: -15px 0 0 0; }
</style>
</head>
<body>
  <h1>single Action</h1>
  <p>これは、シングルアクションコントローラーです。</p>
</body>
</html>
EOF;
  }*/
  
  //リクエストとレスポンス
  /*public function index( Request $request, Response $response ){
  
    $html = <<<EOF
<thml>
<head>
<title>Hello/Index</title>
<style>
body{ font-size: 16pt; color: #999; }
h1{ font-size: 120pt; text-align:right; color:#999; margin: -15px 0 -120px 0; }
</style>
</head>
<body>
<h1>Hello</h1>
<h3>Request</h3>
<pre>{$request}</pre>
<h3>Response</h3>
<pre>{$response}</pre>
</body>
</html>
EOF;
    
    $response -> setContent($html);
    return $response;
  
  }*/
  
  //public function index( Request $request ){
  
    /*$data = [
      'msg' => 'これはコントローラーから渡されたメッセージ',
      'id' => $id
    ];*/
    //クエリー文字 // (Request $request)
    /*$data = [
      'msg' => 'これはコントローラーから渡されたメッセージ',
      'id' => $request -> id
    ];*/
    
    /*$data = [
      'msg' => 'お名前を入力してください',
    ];*/

    /*$data = [
      ['name' => '山田あたえ', 'mail' => 'atae@mail'],
      ['name' => '田中はなこ', 'mail' => 'hanako@mail'],
      ['name' => '鈴木さちこ', 'mail' => 'sachico@mail']
    ];*/

    //return view( 'hello.index', $data );
    //return view( 'hello.index');
  //}

  //バリデーション
  /*public function index( Request $request ){

    if( $request -> hasCookie('msg') ){
      $msg = 'Cookie:'.$request  -> cookie('msg');
    }
    else{
      $msg = 'クッキーはありません';
    }

    return view( 'hello.index', ['msg' => $msg] );

  }

  public function post( Request $request ){

    $validate_rule = [
      'msg' => 'required',
    ];

    $this -> validate( $request, $validate_rule );
    $msg = $request -> msg;

    $response = new Response( view( 'hello.index', ['msg' => '「'.$msg.'」をクッキーに保存しました'] ) );
    $response -> cookie( 'msg', $msg, 100 );

    return $response;

  }*/

  //DB
  public function index( Request $request )
  {
    /*$items = DB::select( 'select * from people' );
    return view( 'hello.index', ['items' => $items] );*/

    $items = DB::table('people') -> get();
    return view( 'hello.index', ['items' => $items] );

  }

  public function post( Request $request )
  {
    $items = DB::select( 'select * from people' );
    return view( 'hello.index', ['items' => $items] );
  }

  public function show( Request $request )
  {

    /*$id = $request -> id;
    $items = DB::table('people') -> where('id', '<=', $id) -> get();*/

    /*$name = $request -> name;
    $items = DB::table('people')
              -> where('name', 'like', '%'.$name.'%')
              -> orWhere('mail', 'like', '%'.$name.'%')
              -> get();*/

    /*$min = $request -> min;
    $max = $request -> max;
    $items = DB::table('people')
              -> whereRaw('age >= ? and age <= ?', [$min, $max])
              -> get();*/

    //$items = DB::table('people') -> orderBy('age', 'asc') -> get();

    $page = $request -> page;
    $items = DB::table('people')
              ->offset($page * 3)
              ->limit(3)
              ->get();

    return view( 'hello.show', ['items' => $items]);

  }

  public  function add( Request $request )
  {
    return view( 'hello.add' );
  }

  public function create( Request $request )
  {

    $param = [
      'name' => $request -> name,
      'mail' => $request -> mail,
      'age' => $request -> age,
    ];

    //DB::insert( 'insert into people (name, mail, age) values (:name, :mail, :age)', $param );
    DB::table('people') -> insert($param);
    return redirect( '/hello' );

  }

  public function edit( Request $request )
  {

    //$param = ['id' => $request -> id];
    //$item = DB::select( 'select * from people where id = :id', $param );
    //return view( 'hello.edit', ['form' => $item[0]] );

    $item = DB::table('people') -> where('id', $request -> id) -> first();

    return view( 'hello.edit', ['form' => $item] );

  }

  public function update( Request $request )
  {

    $param = [
      'name' => $request -> name,
      'mail' => $request -> mail,
      'age' => $request -> age,
    ];

    //DB::update( 'update people set name = :name, mail = :mail, age = :age where id = :id', $param );

    DB::table('people') -> where('id', $request -> id) -> update($param);
    return redirect( '/hello' );

  }

  public function del( Request $request )
  {

    //$param = ['id' => $request -> id];
    //$item = DB::select( 'select * from people where id = :id', $param );
    //return view( 'hello.del', ['form' => $item[0]] );

    $item = DB::table('people') -> where('id', $request -> id) -> first();
    return view('hello.del', ['form' => $item]);

  }

  public function remove( Request $request )
  {

    //$param = ['id' => $request -> id];
    //DB::delete( 'delete from people where id = :id', $param );

    DB::table('people') -> where('id', $request -> id) -> delete();

    return redirect( '/hello' );

  }

  public function rest(Request $request)
  {
    return view('hello.rest');
  }


  public function ses_get(Request $request)
  {
    $sesdata = $request -> session() -> get('msg');

    return view('hello.session', ['session_data' => $sesdata]);
  }

  public function ses_put(Request $request)
  {
    $msg = $request -> input();
    $request -> session() -> put('msg', $msg);

    return redirect('/hello/session');
  }

}