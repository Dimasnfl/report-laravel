<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use App\Models\Category;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('coa.index', [
            "title" => "Chart Of Accounts",
            "coas" => Coa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coa.create', [
            "title" => "Create Chart Of Accounts",
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|min:3|max:3|unique:coas',
            'name' => 'required|unique:coas',
            'category_id' => 'required'
        ]);

        Coa::create($validatedData);

        return redirect('/coa')->with('success', 'New data COA has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coa $coa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coa $coa)
    {
        return view('coa.edit', [
            "title" => "Edit Chart Of Accounts",
            "coa" => $coa,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coa $coa)
    {
        $rules = [
            'code' => 'required|min:3|max:3',
            'name' => 'required',
            'category_id' => 'required'
        ];

        if($request->code != $coa->code) {
            $rules['code'] = 'required|min:3|max:3|unique:coas';
        }

        if($request->name != $coa->name) {
            $rules['name'] = 'required|unique:coas';
        }
        
        $validatedData = $request->validate($rules);

        Coa::where('id', $coa->id)
        ->update($validatedData);

        return redirect('/coa')->with('success', 'COA data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coa $coa)
    {
        Coa::destroy($coa->id);

        return redirect('/coa')->with('success', 'COA data has been deleted!');
    }
}
