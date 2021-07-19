<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use HasRoles;
    public function index()
    {
        //
        $data = Crud::latest()->paginate(5);
        return view('crud.index',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    //   return 
         $request->validate([
             'nombreEscritor' => 'required',
             'articulosEscritos' => 'required',
             'foto'=> 'required|image'
         ]);
         $image = $request->file('foto')->store('public/image');
         $url = Storage::url($image);
         Crud::create([
             'nombreEscritor' => $request->nombreEscritor,
             'articulosEscritos' => $request->articulosEscritos,
             'foto' => $url

         ]);
         
         return redirect()->route('crud.index')
                                 ->with('success','Se Agrego un escritor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //
        return view('crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud)
    {
        //
        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud)
    {
        //
        $request->validate([
            'nombreEscritor' => 'required',
            'articulosEscritos' => 'required',
            'foto'=> 'required|image'
        ]);
        $image = $request->file('foto')->store('public/image');
        $url = Storage::url($image);
        $crud->update([
            'nombreEscritor' => $request->nombreEscritor,
             'articulosEscritos' => $request->articulosEscritos,
             'foto' => $url
        ]);
        return redirect()->route('crud.index')
                        ->with('success','Se actualizo correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')
        ->with('success','Se elimino correctamente');
    }
}
