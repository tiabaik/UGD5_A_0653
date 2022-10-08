<?php

namespace App\Http\Controllers;

/* Import Model */
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Departemen;

class PegawaiController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get posts
        $pegawai = Pegawai::get();

        $pegawai = Pegawai::latest()->paginate(5);

        //render view with posts
        return view('pegawai.index', compact('pegawai'));


    }

    
        /** 
     * create *
     *
     * @return void 
     */

    public function create() 
    { 
        $departemen = Departemen::all();
        return view('pegawai.create', compact('departemen')); 
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
            'email' => 'The :attribute must.',
            'regex' => 'The :attribute must start with 08.',
            'min' => 'The :attribute is minimum.',

        ];
        //Validasi Formulir 
        $this->validate($request, [ 
                'nomor_induk_pegawai' => 'required', 
                'nama_pegawai' => 'required|string|max:15',
                'id_departemen' => 'required', 
                'email' => 'required|email', 
                'telepon' => 'required|regex:/(08)[0-9]{5}/|min:6|max:7',
                'gender' => 'required',
                'tanggal_bergabung' => 'required',
                'status' => 'required'
        ],$messages);

        $pegawai = new Pegawai;

        $pegawai->create([ 
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai, 
                'nama_pegawai' => $request->nama_pegawai,
                'id_departemen' => $request->id_departemen, 
                'email' => $request->email, 
                'telepon' => $request->telepon,
                'gender' => $request->gender,
                'tanggal_bergabung' => $request->tanggal_bergabung,
                'status' => $request->status
        ]);


            return redirect()->route('pegawai.index')->with(['success' 
            => 'Data Berhasil Disimpan']);

        // return $request;
    }
    
    /**
    * edit
    *
    * @param  mixed $pegawai
    * @return void
    */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $departemen = Departemen::all();
        return view('pegawai.edit',compact(['pegawai','departemen']));
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
                'nomor_induk_pegawai' => 'required', 
                'nama_pegawai' => 'required',
                'id_departemen' => 'required', 
                'email' => 'required', 
                'telepon' => 'required',
                'gender' => 'required',
                'tanggal_bergabung' => 'required',
                'status' => 'required'
        ],$messages);
        
        $pegawai = Pegawai::find($id);

        
        $pegawai->update([
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai, 
                'nama_pegawai' => $request->nama_pegawai,
                'id_departemen' => $request->id_departemen, 
                'email' => $request->email, 
                'telepon' => $request->telepon,
                'gender' => $request->gender,
                'tanggal_bergabung' => $request->tanggal_bergabung,
                'status' => $request->status
        ]);
        
        
    if($pegawai){
        //redirect dengan pesan sukses
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('pegawai.index')->with(['error' => 'Data Gagal Diubah!']);
    }
}

    public function destroy($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        if($pegawai){
            return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pegawai.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}