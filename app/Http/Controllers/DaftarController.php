<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
        {
            $daftars = Daftar::get();
            return view('daftars.index',compact('daftars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



            public function create()
         {
      return view('daftars.create');
     }

    


        public function store(Request $request){
            $request->validate([
            'nama_lengkap' => 'required',
            'jk' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'cita_cita' => 'required',
            'hobi' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'golongan_darah' => 'required',
            ]);
        Daftar::create($request->all());
        return redirect()->route('daftars.index')
        ->with('success','Daftar created successfully.');
     }

        


     public function show(Daftar $daftar)
     {
     return view('daftars.show',compact('daftars'));
     } 

     

     public function edit(Daftar $daftar)
     {
     return view('daftars.edit',compact('daftars'));
     }

     

     public function update(Request $request, Daftar $daftar)
     {
     $request->validate([
        'nama_lengkap' => 'required',
        'jk' => 'required',
        'ttl' => 'required',
        'agama' => 'required',
        'cita_cita' => 'required',
        'hobi' => 'required',
        'anak_ke' => 'required',
        'jumlah_saudara' => 'required',
        'tinggi_badan' => 'required',
        'berat_badan' => 'required',
        'golongan_darah' => 'required',
     ]);
     
     $daftar->update($request->all());
     return redirect()->route('daftars.index')
     ->with('success','Daftar updated successfully');
     }

     

   public function destroy(Daftar $daftar)
{
$daftar->delete();
return redirect()->route('daftars.index')
->with('success','Daftar deleted successfully');
}

}
