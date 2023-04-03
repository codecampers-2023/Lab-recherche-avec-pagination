<?php

namespace App\Http\Controllers;

use App\Exports\exportTypeHandicap;
use App\Imports\importTypeHandicap;
use App\Models\type_handicap;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class type_handicapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = type_handicap::paginate(2);
        return view('type handicap.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $query = $request->get('query');
      $data = DB::table('type_handicaps')
                    ->where('nom', 'like', '%'.$query.'%')
                    // ->orWhere('Nom_tache', 'like', '%'.$query.'%')
                    ->paginate(2);
                    // dd($data);
      return view('type handicap.paginate_table', compact('data'))->render();
     }
    }





}
