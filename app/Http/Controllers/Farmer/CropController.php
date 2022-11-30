<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('farmer.crops.index')->with([
            'crops' => Crop::where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmer.crops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title'=>['required'],
            'description'=>['nullable'],
            'price'=>['required','integer','gt:1'],
            'unit'=>['required'],
            'available_quantity'=>['required'],
            'photo'=>['required','mimes:jpg,bmp,png']
        ]);


        $data['user_id'] = Auth::user()->id;

        if($request->hasFile('photo')){
            $ext = $request->file('photo')->getClientOriginalExtension();
            $name = uniqid().".".$ext;

            $path = $request->file('photo')->storeAs('images/crops',$name,'public');
            $data['photo'] = $path;
        }

        Crop::create($data);
        return redirect()->route('farmer.crops.index')->with('success','Crop added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crop $crop)
    {
        return view('farmer.crops.show', compact('crop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crop $crop)
    {
        return view('farmer.crops.edit',compact('crop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crop $crop)
    {
        $data = $request->all();
        if($request->hasFile('photo')){
            $ext = $request->file('photo')->getClientOriginalExtension();
            $name = uniqid().".".$ext;

            $path = $request->file('photo')->storeAs('images/crops',$name,'public');
            $data['photo'] = $path;
        }

        $crop->update($data);
        return redirect()->route('farmer.crops.index')->with('success','Crop updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crop $crop)
    {
        $crop->delete();

        return redirect()->route('farmer.crops.index')->withSuccess('Crop removed');
    }
}
