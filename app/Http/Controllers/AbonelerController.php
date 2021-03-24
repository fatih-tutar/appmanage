<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Abone;
use App\Http\Requests\AboneCreateRequest;
use App\Http\Requests\AboneUpdateRequest;
use Illuminate\Support\Str;

class AbonelerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboneler = Abone::paginate(3);
        return view('admin.abone.list', compact('aboneler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboneCreateRequest $request)
    {
        Abone::create($request->post());
        return redirect()->route('aboneler.index')->withSuccess('Kampanya başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abone = Abone::find($id) ?? abort(404, 'KAMPANYA BULUNAMADI.');
        return view('admin.abone.edit', compact('abone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboneUpdateRequest $request, $id)
    {
        Abone::find($id)->update($request->post());
        return redirect()->route('aboneler.index')->withSuccess('Abone güncelleme işlemi başarıyla gerçekleşti.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abone = AboneCreateRequest::find($id) ?? abort(404, 'KAMPANYA BULUNAMADI.');
        $abone->delete();
        return redirect()->route('aboneler.index')->withSuccess('Abone silme işlemi başarıyla gerçekleşti.');
    }
}
