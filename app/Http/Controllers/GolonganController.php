<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\Pegawai;
use App\Models\Departemen;

class GolonganController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
       //get posts
    $golongan = Golongan::get();
    $golongan = Golongan::latest()->paginate(5);


    //render view with posts
    return view('golongan.index', compact('golongan'));

    }

       /** 
     * create *
     *
     * @return void 
     */

    public function create() 
    { 
        $pegawai = Pegawai::all();
        return view('golongan.create', compact('pegawai')); 
    }

        /**
    * edit
    *
    * @param  mixed $pegawai
    * @return void
    */
    public function edit($id)
    {
        $golongan = Golongan::find($id);
        $pegawai = Pegawai::all();
        return view('golongan.edit',compact(['golongan','pegawai']));
    }

    /** 
     * store
     *
     * @param Request $request 
     * @return void
     */

    public function store(Request $request) 
    { 
        $messages = [
            'required' => 'The :attribute is required.',
            'string' => 'The :attribute must string.',
            'max' => 'The :attribute is maximum.',

        ];
        //Validasi Formulir 
        $this->validate($request, [ 

            'pegawai_id' => 'required', 
            'nomor_golongan' => 'required',
            'gaji_pokok' => 'required', 
            'tunjangan_keluarga' => 'required | max:gaji_pokok', 
            'tunjangan_transport' => 'required | max:gaji_pokok',
            'tunjangan_makan' => 'required | max:gaji_pokok',


        ],$messages);

        $golongan = new Golongan;

        $golongan->create([ 
            'pegawai_id' => $request->pegawai_id, 
            'nomor_golongan' => $request->nomor_golongan,
            'gaji_pokok' => $request->gaji_pokok, 
            'tunjangan_keluarga' => $request->tunjangan_keluarga, 
            'tunjangan_transport' => $request->tunjangan_transport,
            'tunjangan_makan' => $request->tunjangan_makan,
    
        ]);


            return redirect()->route('golongan.index')->with(['success' 
            => 'Data Berhasil Disimpan']);

        // return $request;
    }
    


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $pegawai
    * @return void
    */
    public function update($id, Request $request)
    {
        $messages = [
            'required' => 'The :attribute is required!!!',
        ];

        $this->validate($request, [ 
                'pegawai_id' => 'required', 
                'nomor_golongan' => 'required',
                'gaji_pokok' => 'required', 
                'tunjangan_keluarga' => 'required | max : gaji_pokok',
                'tunjuangan_transport' => 'required | max : gaji_pokok',
                'tunjangan_makan' => 'required | max : gaji_pokok',
        ],$messages);
        
        $golongan = Golongan::find($id);

        
        $golongan->update([
                'pegawai_id' => $request->pegawai_id, 
                'nomor_golongan' => $request->nomor_golongan,
                'gaji_pokok' => $request->gaji_pokok, 
                'tunjangan_keluarga' => $request->tunjangan_keluarga, 
                'tunjuangan_transport' => $request->tunjuangan_transport,
                'tunjangan_makan' => $request->tunjangan_makan,
        
        ]);
        
        
    if($golongan){
        //redirect dengan pesan sukses
        return redirect()->route('golongan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('golongan.index')->with(['error' => 'Data Gagal Diubah!']);
    }
}

    public function destroy($id){
        $golongan = Golongan::find($id);
        $golongan->delete();
        if($golongan){
            return redirect()->route('golongan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('golongan.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    
}
