<?php

namespace i616\Soteria\Http\Controllers;

use i616\Soteria\Models\Vault;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaults = Vault::all();

        return view('soteria::vaults.index')
            ->with('vaults', $vaults);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soteria::vaults.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vault = new Vault();
        $vault->name = $request->input('name');
        $vault->company_id = $request->input('company_id');
        $vault->save();

        return redirect('/vault/'.$vault->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function show(Vault $vault)
    {
        return view('soteria::vaults.show')
            ->with('vault', $vault);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function edit(Vault $vault)
    {
        return view('soteria::vaults.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vault $vault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vault $vault)
    {
        //
    }
}
