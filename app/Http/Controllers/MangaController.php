<?php

namespace App\Http\Controllers;


use App\Models\Manga;
use Illuminate\Http\Request;

class MangaController extends Controller
{

    public function user()
    {
        $datamanga = Manga::all();
        return view("crud.index", compact("datamanga"));
    }


    public function show($id)
    {
        $datamanga = Manga::find($id);
        return $datamanga;
    }

    public function create()
    {
        return view('crud.create');
    }

    public function uploadmanga(Request $request)
    {

        
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'rate' => 'required',
            'desc' => 'required',
            'genre' => 'required',
            'gambar' => 'required'
        ]);

        $datamanga = $request -> all();
   
          
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'assets/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $datamanga['gambar'] = "$profileImage";
        }else{
            unset($datamanga['gambar']);
        }

        Manga::create($datamanga);

        return redirect()->route('index')->with('success, manga success added');
    

    }

    public function editmanga(Request $request, $id)
    {
        $datamanga = Manga::find($id);
        return view('crud.edit', compact('datamanga'));

    }

   

    public function updatemanga(Request $request, $id)
    {
        $datamanga = Manga::find($id);
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'rate' => 'required',
            'desc' => 'required',
            'genre' => 'required',
            'gambar' => 'required'
        ]);

        $datamanga = request()->except(['_method', '_token']);
        
        
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'assets/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $datamanga['gambar'] = "$profileImage";
        }else{
            unset($datamanga['gambar']);
        }
      
        return redirect()->route('index')->with('success, manga success added');
    }

    public function deletemanga($id)
    {
        $datamanga = Manga::find($id);
        $datamanga->delete();

        return redirect('/manga');
    }


   
    
}
