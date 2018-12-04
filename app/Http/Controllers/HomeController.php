<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mobil;
use App\RequestUnit;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showlist()
    {
      $mobil = new Mobil();
      $mobils = Mobil::all()->toArray();
      return view('home.index', compact('mobils'));
    }

    public function showrequestunit($id)
    {
      $mobil = Mobil::find($id);
      return view('home.requestunit',compact('mobil','id'));
    }

    public function requestunit(Request $request)
    {
      $this->validate(request(), [
        'jumlahunit' => 'required',
      ]);

      $requestunit = new RequestUnit();
      $requestunit->jumlahunit = $request->get('jumlahunit');
      $requestunit->status = $request->get('status');
      $requestunit->mobil_id = $request->get('mobil_id');
      $requestunit->user_id = Auth::user()->id;

      $requestunit->save();

      return back()->with('success','Unit Telah Di Request');
      // return true;
    }

    public function historirequest()
    {
      // $requestunits = RequestUnit::where();
      $requestunits = RequestUnit::whereHas('user', function ($query) {
        $query->where('id', Auth::user()->id);
      })->get();
      // $requestunits = RequestUnit::where('user_id', '1' )->get()->first();
      //
      return view('home.historireq', compact('requestunits'));
    }
}
