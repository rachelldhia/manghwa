<?php

namespace App\Http\Controllers;

use App\Models\Manhwa;
use Illuminate\Http\Request;

class ManhwaController extends Controller
{
    public function user()
    {
        $datamanhwa = Manhwa::all();
        return view("crud.index", compact("datamanhwa"));
    }

    public function show($id)
    {
        $datamanhwa = Manhwa::find($id);
        return $datamanhwa;
    }

    public function create()
    {
        return view('crud.create');
    }

    public function uploadmanhwa(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'rate' => 'required',
            'desc' => 'required',
            'genre' => 'required',
            'gambar' => 'required'
        ]);

        $datamanhwa = new Manhwa;
        $gambar = $request->image;
        $gambarname = time() . '.' . $gambar->getClientOriginalExtension();
        $request->gambar->move('gambarmanga', $gambarname);

        $datamanhwa->gambar = $gambarname;
        $datamanhwa->title = $request->title;
        $datamanhwa->author = $request->author;
        $datamanhwa->rate = $request->rate;
        $datamanhwa->desc = $request->desc;
        $datamanhwa->genre = $request->genre;
        $datamanhwa->save();

        return redirect()->back();
        // kalo gak bisa balik pake redirect(/manga)

    }

    public function editmanhwa(Request $request, $id)
    {
        $datamanhwa = Manhwa::find($id);
        return view('crud.edit', compact('manhwa'));

    }

   

    public function updatemanhwa(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'rate' => 'required',
            'desc' => 'required',
            'genre' => 'required',
            'gambar' => 'required'
        ]);

        $datamanhwa = Manhwa::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $gambarname = time() . '.' . $gambar->getClientOriginalExtension();
            $request->$gambar->move('gambarmanga', $gambarname);
            $datamanhwa->$gambar = $gambarname;
        }

        $datamanhwa->title = $request->title;
        $datamanhwa->author = $request->author;
        $datamanhwa->rate = $request->rate;
        $datamanhwa->desc = $request->desc;
        $datamanhwa->genre = $request->genre;
        $datamanhwa->save();

        return redirect()->back();
    }

    public function deletemanhwa($id)
    {
        $datamanhwa = Manhwa::find($id);
        $datamanhwa->delete();

        return redirect()->back();
    }

}
