<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Http\Requests\SubscriberCreateRequest;
use App\Http\Requests\SubscriberUpdateRequest;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::paginate(3);
        return view('admin.subscriber.list', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscriber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriberCreateRequest $request)
    {
        Subscriber::create($request->post());
        return redirect()->route('subscribers.index')->withSuccess('Abone başarıyla eklendi.');
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
        $subscriber = Subscriber::find($id) ?? abort(404, 'ABONE BULUNAMADI.');
        return view('admin.subscriber.edit', compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberUpdateRequest $request, $id)
    {
        Subscriber::find($id)->update($request->post());
        return redirect()->route('subscribers.index')->withSuccess('Abone güncelleme işlemi başarıyla gerçekleşti.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::find($id) ?? abort(404, 'ABONE BULUNAMADI.');
        $subscriber->delete();
        return redirect()->route('subscribers.index')->withSuccess('Abone silme işlemi başarıyla gerçekleşti.');
    }
}
