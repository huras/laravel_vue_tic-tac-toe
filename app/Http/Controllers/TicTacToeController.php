<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class TicTacToeController extends Controller
{
    public function GameScreen(){
        return view('tic-tac-toe');
    }

    public function last5results(){
        $last5 = Result::latest()->take(5)->get();
        return response()->json(['last5' => $last5]);
    }

    public function getResults(){
        $page = request()->input('page', 1);
        $itemsPerPage = request()->input('itemsPerPage', 10);

        $results = Result::paginate($itemsPerPage, ['*'], 'page', $page);

        return response()->json(['results' => $results]);
    }

    public function store(Request $request){
        $result = Result::create($request->all());
        $last5 = Result::latest()->take(5)->get();
        return response()->json(['result' => $result, 'last5' => $last5]);
    }
}
