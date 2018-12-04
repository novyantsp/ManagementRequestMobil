<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\User;
use App\RequestUnit;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function showaddunit()
    {
        return view('mobil.create');
    }

    public function addunit(Request $request)
    {
        $request->validate([
          'merkmobil' => 'required',
          'tipemobil' => 'required',
          'tahunbuat' => 'required|numeric',
          'namamobil' => 'required',
          'jumlahunit' => 'required|numeric',
          'tersedia' => 'required',
        ]);

        $mobil = new Mobil();
        $mobil->merkmobil = $request->get('merkmobil');
        $mobil->tipemobil = $request->get('tipemobil');
        $mobil->tahunbuat = $request->get('tahunbuat');
        $mobil->namamobil = $request->get('namamobil');
        $mobil->jumlahunit = $request->get('jumlahunit');
        $mobil->tersedia = $request->get('tersedia');
        $mobil->save();

        return back()->with('success', 'Mobil has been added');
    }

    public function showunit()
    {
      $mobils = Mobil::all()->toArray();
      return view('mobil.index', compact('mobils'));
    }

    public function showuser()
    {
      $user = new User();
      $users = User::all()->toArray();
      return view('user.index', compact('users'));
    }

    public function destroyunit($id)
    {
      $mobil = Mobil::find($id);
      $mobil->delete();
      return back()->with('success','Unit has been deleted');
    }

    public function destroyuser($id)
    {
      $user = User::find($id);
      $user->delete();
      return back()->with('success','User has been deleted');
    }

    public function editunit($id)
    {
      $mobil = Mobil::find($id);
      return view('mobil.edit',compact('mobil','id'));
    }

    public function updateunit(Request $request, $id)
    {
      $mobil = Mobil::find($id);
      $this->validate(request(), [
        'merkmobil' => 'required',
        'tipemobil' => 'required',
        'tahunbuat' => 'required|numeric',
        'namamobil' => 'required',
        'jumlahunit' => 'required|numeric',
        'tersedia' => 'required',
      ]);

      $mobil->merkmobil = $request->get('merkmobil');
      $mobil->tipemobil = $request->get('tipemobil');
      $mobil->tahunbuat = $request->get('tahunbuat');
      $mobil->namamobil = $request->get('namamobil');
      $mobil->jumlahunit = $request->get('jumlahunit');
      $mobil->tersedia = $request->get('tersedia');
      $mobil->save();

      return back()->with('success','Product has been updated');
    }

    public function listrequest()
    {
      $requestunits = RequestUnit::all();
      return view('mobil.listrequest', compact('requestunits'));
    }

    public function editrequest($id)
    {
      $requestunit = RequestUnit::find($id);
      return view('mobil.editrequest',compact('requestunit','id'));
    }

    public function updaterequest(Request $request, $id)
    {
      $mobil = Mobil::find($id);
      $requestunit = RequestUnit::find($id);
      $this->validate(request(), [
        'status' => 'required',
      ]);

      $requestunit->status = $request->get('status');

      if ($requestunit->status == 1) {
        $requestunit->mobil->jumlahunit = $request->get('sisa');
        $requestunit->save();
      }

      $requestunit->save();

      return back()->with('success','Product has been updated');
    }
}
