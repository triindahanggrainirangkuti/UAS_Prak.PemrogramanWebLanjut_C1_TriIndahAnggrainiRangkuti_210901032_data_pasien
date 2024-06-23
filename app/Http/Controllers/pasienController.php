<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Halaman  Home 
        $pasien = pasien::orderBy('nik', 'asc')->simplePaginate(5);
        $no = 1;
        return view('pasien.index', compact('pasien', 'no'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Halaman tambah
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Simpan tambah 

        Session::flash('nik', $request->nik);
        Session::flash('nama_pasien', $request->nama_pasien);
        Session::flash('keluhan', $request->keluhan);
        Session::flash('tgl_periksa', $request->tgl_periksa);
        Session::flash('alamat', $request->alamat);


        $request->validate(
            [
                'nik' => 'required|numeric|unique:pasien,nik',
                'nama_pasien' => 'required',
                'jk' => 'required',
                'keluhan' => 'required',
                'tgl_periksa' => 'required',
                'alamat' => 'required'
            ],
            [
                'nik.required' => 'NIK tidak boleh kosong!',
                'nik.numeric' => 'NIK harus diisi dalam bentuk angka',
                'nik.unique' => 'NIK sudah ada sebelumnya',
                'nama_pasien.required' => 'Nama Pasien tidak boleh kosong!',
                'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
                'keluhan.required' => 'Keluhan tidak boleh kosong!',
                'tgl_periksa.required' => 'Tanggal Periksa tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!'
            ]
        );

        $data = [
            'nik' => $request->nik,
            'nama_pasien' => $request->nama_pasien,
            'jk' => $request->jk,
            'keluhan'=> $request->keluhan,
            'tgl_periksa' => $request->tgl_periksa,
            'alamat' => $request->alamat
        ];
        pasien::create($data);
            return redirect('/pasien')->with('success','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Halaman detail
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Halaman edit
        $data = pasien::where('nik', $id)->first();
        return view('pasien.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Proses simpan edit
        $request->validate(
            [
                'nama_pasien' => 'required',
                'jk' => 'required',
                'keluhan' => 'required',
                'tgl_periksa' => 'required',
                'alamat' => 'required'
            ],
            [
                'nama_pasien.required' => 'Nama Pasien tidak boleh kosong!',
                'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
                'keluhan.required' => 'Keluhan tidak boleh kosong!',
                'tgl_periksa.required' => 'Tanggal Periksa tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!'
            ]
        );

        $data = [
            'nik' => $request->nik,
            'nama_pasien' => $request->nama_pasien,
            'jk' => $request->jk,
            'keluhan'=> $request->keluhan,
            'tgl_periksa' => $request->tgl_periksa,
            'alamat' => $request->alamat
        ];
        pasien::where('nik', $id)->update($data);
            return redirect('/pasien')->with('success','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Proses hapus
        pasien::where('nik', $id)->delete();
        return redirect()->to('pasien')->with('Successfully', 'Data berhasil didelete!');
    }
    }

