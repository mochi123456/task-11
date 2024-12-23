<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_mahasantri = DB::table('mahasantri') //join tabel dengan Query Builder Laravel
            ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
            ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
            ->join('matakuliah', 'matakuliah.id', '=', 'dosen.matakuliah_id')
            ->select('mahasantri.*', 'dosen.nama AS dp', 'jurusan.nama AS jrs',
                    'matakuliah.nama AS mk')->get();
        return view('mahasantri.index',compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mengarahkan Ke FORM Create
        return view('mahasantri.c_mahasantri');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. Tangkap Data
        DB::table('mahasantri')->insert(
            [
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'dosen_id'=>$request->dosen_id,
                'jurusan_id'=>$request->jurusan_id,
                'matakuliah_id'=>$request->matakuliah_id,
            ]
        );

        //2. setelah input data arahkan ke/buku
        return redirect()->route('mahasantri.index')->with('success', 'Data Mahasantri Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_mahasantri = DB::table('mahasantri')
        ->join('dosen', 'mahasantri.dosen_id', '=', 'dosen.id')
        ->join('jurusan', 'mahasantri.jurusan_id', '=', 'jurusan.id')
        ->join('matakuliah', 'mahasantri.matakuliah_id', '=', 'matakuliah.id')
        ->select('mahasantri.*', 'dosen.nama AS dp', 'jurusan.nama AS jrs', 'matakuliah.nama AS mk')
        
        ->where('mahasantri.id','=',$id)->get();

    return view('mahasantri.show', compact('ar_mahasantri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //mengarahkan ke halaman form edit
         $data = DB::table('mahasantri')->where('id','=',$id)->get();
         return view('mahasantri.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //mengarahkan ke halaman update
        DB::table('mahasantri')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'dosen_id'=>$request->dosen_id,
                'jurusan_id'=>$request->jurusan_id,
                'matakuliah_id'=>$request->matakuliah_id,
            ]
        );

        return redirect('mahasantri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Menghapus Data
        DB::table('mahasantri')->where('id',$id)->delete();
        return redirect('mahasantri');
    }
}
