<?php

namespace App\Http\Controllers;

use App\Models\Smasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $smasuk = Smasuk::latest();
        // if(request('search')) {
        //     $smasuk->where('perihal', 'like', '%' . request('search') . '%');
        // }
         
        // dd(request('cari'));
        // $smasuk = DB::table('smasuks')->paginate(1);
        // $smasuk = Smasuk::get();


        $smasuk = Smasuk::paginate(10);
        return view('smasuk.index', compact('smasuk'));
        //  return view('smasuk.index',['smasuk' => $smasuk]);
    }

    public function cetak()
    {
        $smasuk = Smasuk::all();
        return view('smasuk.cetak', compact('smasuk'));
        //   return $smasuk;
        //  return view('smasuk.index',['smasuk' => $smasuk]);
    }


    public function cari(Request $request)
    {
        // dd(request('cari'));
        // return $request;
        $cari = $request->cari;
        $smasuk = Smasuk::where('perihal', 'like', '%' .$cari. '%')->paginate();
        return view('smasuk.index', ['smasuk' =>$smasuk]);
        // return $smasuk;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $smasuk = Smasuk::all();
        return view('smasuk.add', compact('smasuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'nomasuk' => 'required',
                'perihal' => 'required',
                'asal' => 'required',
                'tanggal' => 'required',
                'ket' => 'required',

            ],
            [
                'nomasuk.required' => 'WAJIB DIISI!',
                'perihal.required' => 'WAJIB DIISI!',
                'asal.required' => 'WAJIB DIISI!',
                'tanggal.required' => 'WAJIB DIISI!',
                'ket.required' => 'WAJIB DIISI!',
            ]
        );

        $img = $request->file('file');
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto kelaravel

        // untuk memasukkan data ketable
        Smasuk::create([
            'photo'=> $nama_file,
            'nomasuk' => $request->nomasuk,
            'perihal' => $request->perihal,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'ket' => $request->ket,
        ]);


        $data = Smasuk::where(
            'nomasuk',
            $request->nomasuk
        )->get();
        // dd($data);  


        return redirect('/smasuk')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Smasuk  $smasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Smasuk $smasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Smasuk  $smasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Smasuk $smasuk)
    {
        return view('smasuk.edit', compact('smasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Smasuk  $smasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Smasuk $smasuk)
    {
        $request->validate(
            [
                'nomasuk' => 'required',
                'perihal' => 'required',
                'asal' => 'required',
                'tanggal' => 'required',
                'ket' => 'required',

            ],
            [
                'nomasuk.required' => 'WAJIB DIISI!',
                'perihal.required' => 'WAJIB DIISI!',
                'asal.required' => 'WAJIB DIISI!',
                'tanggal.required' => 'WAJIB DIISI!',
                'ket.required' => 'WAJIB DIISI!',
            ]
        );

        Smasuk::where('id', $smasuk->id)->update([
            'nomasuk' => $request->nomasuk,
            'perihal' => $request->perihal,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'ket' => $request->ket,
        ]);

        return redirect('/smasuk')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Smasuk  $smasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Smasuk $smasuk)
    {
      
        Smasuk::destroy('id', $smasuk->id);
        return redirect('/smasuk')->with('status', 'Berhasil Dihapus');
    }
}
