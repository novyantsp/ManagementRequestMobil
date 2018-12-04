<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
