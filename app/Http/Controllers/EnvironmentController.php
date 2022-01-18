<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnvironmentRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        // dd($tenants);

        return view('environments.index', ['environments' => $tenants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('environments.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnvironmentRequest $request)
    {
        /** Procedimento que cria o tenant e dispara events para crição
         * de BD, Migrations e Seeds
         */
        $tenant = Tenant::create(['id' => $request->input('id')]);
        $tenant->domains()->create(['domain' => $request->input('domain')]);

        return redirect()->route('environments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $tenant = Tenant::find($id);
        // dd($tenant);
        $tenant->delete();
        return redirect()->route('environments.index');
    }
}
