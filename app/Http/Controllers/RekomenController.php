<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekomen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new saran($request->keluhan, $request->tahun);
        $data =[
            'nama_jamu' => $a->namaJamu(),
            'khasiat' => $a->khasiat(),
            'keluhan' => $request->keluhan,
            'umur' => $a->hitungUmur(),
            'saran_guna' => $a->rekomen1(),
            'saran_konsum' => $a->rekomen2(),
        ];
        return view('rekomen', compact('data'));
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

// membuat parent class jamu

class Jamu{
    public function __construct($keluhan, $tahun)
    {
        // membuat deklasi parameter
        $this->keluhan=$keluhan;
        $this->tahun=$tahun;
        
    }
    public function namaJamu()
    {
        if ($this->keluhan == 'keseleo') {
            return "Beras Kencur";
        }else if ($this->keluhan == 'kurang nafsu makan') {
            return "Beras Kencur";
        }else if ($this->keluhan == 'pegal-pegal') {
            return "Kunyit Asam";
        }else if ($this->keluhan == 'darah tinggi') {
            return "Brotowali";
        }else if ($this->keluhan == 'gula darah') {
            return "Brotowali";
        }else if ($this->keluhan == 'kram perut') {
            return "Temulawak";
        }else if ($this->keluhan == 'masuk angin') {
            return "Temulawak";
        }else{
            return "Tidak Terdaftar";
        }
    }
    //membuat fungsi menghitung umur
    public function hitungUmur()
    {
        return date("Y") - $this->tahun;
    }
    //membuat pengkondisian khasiat yang sesuai dengan jamu
    public function khasiat()
    {
        if ($this->namaJamu() == 'Beras Kencur'){
            return "Dapat mengobati keseleo dan memperbaiki nafsu makan";
        }else if($this->namaJamu() == 'Kunyit Asam'){
            return "Dapat mengobati pegal-pegal";
        }else if($this->namaJamu() == 'Brotowali'){
            return "Dapat menurunkan darah tinggi dan gula darah";
        }else if($this->namaJamu() == 'Temulawak'){
            return "Dapat mengobati kram peut dan masuk angin";
        }else{
            return "Tidak Terdaftar";
        }
    }
}
//membuat child class dari jamu
class saran extends Jamu{
    public function rekomen1()
    {
        //membuat saran konsumsi sesuai dengan fungsi umur
        if ($this->hitungUmur() <=10){
            return "Dikonsumsi 1X";
        }else{
            return "Dikonsumsi 2X";
        }
    }
    public function rekomen2()
    {
        //membuat saran penggunaan
        if($this->keluhan == "keseleo") {
            return "Dioleskan";
        }else{
            return "Dikonsumsi";
        }
    }
}