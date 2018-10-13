<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    //
  public function index(Request $request)
  {
    $items = Board::all();
    return view('board.index', ['items' => $items]);
  }

  public function add(Request $request)
  {
    return view('board.add');
  }

  public function create(Request $request)
  {
    $this -> validate($request, Board::$rules);
    $board = new Board;
    $from = $request -> all();
    unset($from['_token']);
    $board -> fill($from) -> save();

    return redirect('/board');
  }
}
