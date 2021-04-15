<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Http\Requests\CampaignCreateRequest;
use App\Http\Requests\CampaignUpdateRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class JsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FOREVER => SİLMEDİĞİMİZ SÜRECE KALMASINI İSTEDİĞİMİZ BİR KEY VARSA
        // Cache::forever('test', 'deger');
        //FORGET => İLGİLİ KEYİN CACHEİNİ SİLMEK İSTEDİĞİMİZDE
        // Cache::forget('test');
        //FLUSH => KOMPLE BÜTÜN CACHEİ SİLMEK İSTERSEK
        // Cache::flush();
        //PULL => KEY VARSA DEĞERİ ALIR SONRA KEYİ SİLER
        // $test = Cache::pull('test');

        //HER YERDE Cache:: KULLANMAK YERİNE BU ŞEKİLDE DEĞİŞKENE ATAYABİLİRİZ. AYRICA BU ŞEKİLDE file database memcached redis şeklinde YÖNTEMLERİ BURADAN DEĞİŞTİREBİLİRİZ.
        //$cache = Cache::store('database');

        // BURADAN BU PRİNT İŞLEMİ YORUMUNA KADAR Kİ ALAN STANDART FİLE YÖNTEMİ AYNI İŞLEMİN DATABASE İLE BERABER YAPILANIN GEÇECEĞİZ
        if(Cache::has('tgappcampaigns')){
            return Cache::get('tgappcampaigns', function(){ //bu işlemde function tanımlamak zorunda değiliz sonuçta ifin içine varsa giriyor direk cache'i get yapabiliriz.
                return Campaign::all(); 
            });
        }
        $tgcampaigns = Campaign::all();
        Cache::put('tgappcampaigns', $tgcampaigns, now()->addMinutes(1));
        return $tgcampaigns;

        // BU PRİNT İŞLEMİ
        // dd('22');

        // BU TAG VAR MI YOK MU CACHE SORGULAMA KODU
        // dd(Cache::has('tgappcampaigns')); 

        // İKİNCİ KULLANIM REMEMBER İLE OLAN FUNCTİONDAKİ SORGU YOKSA TAGE ATAMA YAPIYOR
        // return Cache::remember('tgappcampaigns', '120', function(){
        //     return Campaign::all();
        // });  

        // BU CACHE'İN İLK KULLANIMI
        // return Cache::get('tgappcampaigns', function(){
        //     return Campaign::all();
        // });   
        
        // BU BENİM CACHE KULLANMADAN JSONI YAZDIRMA ŞEKLİM
        // $campaigns = Campaign::all();
        // return response()->json($campaigns);
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignCreateRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title) . '.' . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        Campaign::create($request->post());
        return redirect()->route('campaigns.index')->withSuccess('Kampanya başarıyla eklendi.');
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
        $campaign = Campaign::find($id) ?? abort(404, 'KAMPANYA BULUNAMADI.');
        return view('admin.campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignUpdateRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title) . '.' . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }

        Campaign::find($id)->update($request->post());
        return redirect()->route('campaigns.index')->withSuccess('Kampanya güncelleme işlemi başarıyla gerçekleşti.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::find($id) ?? abort(404, 'KAMPANYA BULUNAMADI.');
        $campaign->delete();
        return redirect()->route('campaigns.index')->withSuccess('Kampanya silme işlemi başarıyla gerçekleşti.');
    }
}
