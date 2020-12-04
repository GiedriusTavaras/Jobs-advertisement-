<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('language.index', ['languages' => $languages]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
       [
           'language_language' => ['required', 'min:1', 'max:10'],

       ],
        [
            'language_language.required' => 'language field cannot be empty!',
            'language_language.min' => 'language too short!',
            'language_language.max' => 'language too long!',
        ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $language = new Language;
        $language->language = $request->language_language;
        $language->save();
        return redirect()->route('language.index')->with('success_message', 'Language "'.$language->language.'" Successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('language.edit', ['language' => $language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $validator = Validator::make($request->all(),
       [
           'language_language' => ['required', 'min:1', 'max:10'],

       ],
        [
            'language_language.required' => 'language field cannot be empty!',
            'language_language.min' => 'language too short!',
            'language_language.max' => 'language too long!',
        ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $language->language = $request->language_language;
        $language->save();
        return redirect()->route('language.index')->with('info_message', 'Language "'.$language->language.'" Successfully updated.');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        if($language->languageAds->count()){
            return redirect()->route('language.index')->with('error_message', 'Cannot delete language "'.$language->language.'" because there are ads that use this language.');
        }
        $language->delete();
        return redirect()->route('language.index')->with('success_message', 'Language "'.$language->language.'" Successfully deleted.');
 
 
    }
}
