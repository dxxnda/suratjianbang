<?php

namespace App\Http\Controllers;

use App\Models\Skeluar;
use Illuminate\Http\Request;

class SkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skeluar = Skeluar::paginate(10);
        return view('skeluar.index', compact('skeluar'));
    }
    public function cetak()
    {
        // dd(request('cari'));
        $skeluar = Skeluar::all();
        return view('skeluar.cetak', compact('skeluar'));
    }

    public function cari(Request $request)
    {
        // dd(request('cari'));
        // return $request;
        $cari = $request->cari;
        $skeluar = Skeluar::where('perihal', 'like', '%' .$cari. '%')->paginate();
        return view('skeluar.index', ['skeluar' =>$skeluar]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skeluar = Skeluar::paginate(1);
        return view('skeluar.add', compact('skeluar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nokeluar' => 'required',
                'perihal' => 'required',
                'dituju' => 'required',
                'tanggal' => 'required',
                'ket' => 'required',
            ],
            [
                'nokeluar.required' => 'WAJIB DIISI!',
                'perihal.required' => 'WAJIB DIISI!',
                'dituju.required' => 'WAJIB DIISI!',
                'tanggal.required' => 'WAJIB DIISI!',
                'ket.required' => 'WAJIB DIISI!',
            ]
        );

        $img = $request->file('file');
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $img->move('dist/img', $nama_file);

        Skeluar::create([
            'file'=> $nama_file,
            'nokeluar' => $request->nokeluar,
            'perihal' => $request->perihal,
            'dituju' => $request->dituju,
            'tanggal' => $request->tanggal,
            'ket' => $request->ket,
        ]);

        $data = Skeluar::where('nokeluar', 
        $request->nokeluar)->get();
        // dd($data);  

        return redirect('/skeluar')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skeluar  $skeluar
     * @return \Illuminate\Http\Response
     */
    public function show(Skeluar $skeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skeluar  $skeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Skeluar $skeluar)
    {
        return view('skeluar.edit', compact('skeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skeluar  $skeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skeluar $skeluar)
    {
        $request->validate(
            [
                'nokeluar' => 'required',
                'perihal' => 'required',
                'dituju' => 'required',
                'tanggal' => 'required',
                'ket' => 'required',
            ],
            [
                'nokeluar.required' => 'WAJIB DIISI!',
                'perihal.required' => 'WAJIB DIISI!',
                'dituju.required' => 'WAJIB DIISI!',
                'tanggal.required' => 'WAJIB DIISI!',
                'ket.required' => 'WAJIB DIISI!',
            ]
        );

        $img = $request->file('file');
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $img->move('dist/img', $nama_file);

        Skeluar::where('id', $skeluar->id)->update([
            'file'=> $nama_file,
            'nokeluar' => $request->nokeluar,
            'perihal' => $request->perihal,
            'dituju' => $request->dituju,
            'tanggal' => $request->tanggal,
            'ket' => $request->ket,
        ]);

        return redirect('/skeluar')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skeluar  $skeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skeluar $skeluar)
    {
        Skeluar::destroy('id', $skeluar->id);
        return redirect('/skeluar')->with('status', 'Berhasil Dihapus');
    }
}
