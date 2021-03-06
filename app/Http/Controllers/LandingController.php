<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing;
use App\Models\Master\PricingCity;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function heroGet()
    {
        $item = Landing::select('id',
                                'hero_title', 
                                'hero_description', 
                                'hero_image')->first();
        
        return view('backend.pages.landing.hero', compact('item'));
    }

    public function heroUpdate(Request $request, $id)
    {
        $request->validate([
            'hero_title' => 'required|max:50',
            'hero_description' => 'required',
            'hero_image' => $request->old_img ? '' : 'required|image'
        ]);
        
        $data = $request->except('old_img');
        $data['hero_image'] = $request->hasFile('hero_image') 
                                ? $request->file('hero_image') ->store('hero', 'public')
                                : $request->old_img;
                                                  
        $update = Landing::findOrFail($id)->update($data);

        if ($update) {
            return redirect()->route('hero.index')->with('success', 'Data Updated');
        }
            return redirect()->route('hero.index')->with('failed', 'Data Doesn\'t Updated');
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutGet()
    {
        $item = Landing::select('id', 'about_us')->first();

        return view('backend.pages.landing.about', compact('item'));
    }


    public function aboutUpdate(Request $request, $id)
    {
        $request->validate([
            'about_us' => 'required'
        ]);

        $data = $request->only('about_us');

        Landing::findOrFail($id)->updated($data);

        return redirect()->route('about.index')->with('success' ,'Data About Updated');
    }

    public function cityGet() 
    {
        
    }

    public function getPriceCity()
    {

    }
}

