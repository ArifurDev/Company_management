<?php

namespace App\Http\Controllers;

use App\Models\comopany;
use Illuminate\Http\Request;

class ComopanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comopanies = comopany::latest()->paginate(15);

        return view('dashbord.company.create', compact('comopanies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required|unique:comopanies,compony_name',
        ]);

        $comopany = new comopany;
        $comopany->compony_name = $request->compony_name;
        $comopany->save();

        return redirect()->back()->withSuccess('Company Create successfuliy');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(comopany $comopany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(comopany $comopany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comopany $comopany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comopany  $comopany
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        comopany::find($id)->delete();

        return redirect()->back()->withSuccess('Company Deleted!');
    }
}
