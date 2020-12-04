<?php

namespace App\Http\Controllers;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $languages = Language::orderBy('language')->get();
        
        $order = $sort = $language_id ='';

        
        if ($request->language_id) {
            $language_id = (int) $request->language_id;
        }

        if ($request->sort) {

            $order = $request->dir ? $request->dir : 'asc';
            if (!in_array($order, ['asc', 'desc'], 1)) {
                $order = 'asc';
            }
            $sort = $request->sort;
            if (!in_array($sort, ['salary', 'title'], 1)) {
                $sort = 'none';
            }

            if ('salary' == $sort) {
                $ads = $language_id ? 
                Ad::where('language_id', $language_id)->orderBy('salary', $order)->paginate(2):
                Ad::orderBy('salary', $order)->paginate(2);
                // $ads = Ad::orderBy('salary', $order)->paginate(2);
            }
            elseif ('title' == $sort) {
                $ads = $language_id ? 
                Ad::where('language_id', $language_id)->orderBy('title', $order)->paginate(2):
                Ad::orderBy('title', $order)->paginate(2);
            } else {
                $ads = $language_id ? 
                Ad::where('language_id', $language_id)->orderBy('title')->paginate(2):
                Ad::orderBy('title')->paginate(2);
            }
            
        }
        else {
            $ads = $language_id ? 
            Ad::where('language_id', $language_id)->orderBy('title')->paginate(2):
            Ad::orderBy('title')->paginate(2);
        }


        return view('ad.index', compact('ads', 'languages', 'sort', 'order', 'language_id')); 
 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('ad.create', ['languages' => $languages]);
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
           'ad_title' => ['required', 'min:5', 'max:64'],
           'ad_description' => ['required', 'min:5', 'max:1000'],
           'ad_salary' => ['required', 'integer', 'min:1', 'max:10000'],
           'ad_area1' => ['required', 'min:3', 'max:30'],
           'ad_area2' => ['max:10000'],
           'ad_area3' => ['max:10000'],
           'ad_area4' => ['max:10000'],
           'ad_area5' => ['max:10000'],

       ],
        [
            'ad_title.required' => 'Title field cannot be empty!',
            'ad_title.min' => 'Title too short!',
            'ad_title.max' => 'Title too long!',
            'ad_description.required' => 'Description field cannot be empty!',
            'ad_description.min' => 'Description too short!',
            'ad_description.maz' => 'Description too long!',
            'ad_salary.required' => 'Salary field cannot be empty!',
            'ad_salary.min' => 'Salary too short!',
            'ad_salary.integer' => 'Salary must be numbers only!',
            'ad_salary.maz' => 'Salary too long!',
            'ad_area1.required' => 'Job areas 1 field cannot be empty',
            'ad_area1.min' => 'Job areas 1 too short!',
            'ad_area1.maz' => 'Job areas 1 too long!',
            'ad_area2.maz' => 'Job areas 2 too long!',
            'ad_area3.maz' => 'Job areas 3 too long!',
            'ad_area4.maz' => 'Job areas 4 too long!',
            'ad_area6.maz' => 'Job areas 5 too long!',
        ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $ad = new Ad;
        $ad->title = $request->ad_title;
        $ad->description = $request->ad_description;
        $ad->salary = $request->ad_salary;
        $ad->area1 = $request->ad_area1;
        $ad->area2 = $request->ad_area2;
        $ad->area3 = $request->ad_area3;
        $ad->area4 = $request->ad_area4;
        $ad->area5 = $request->ad_area5;
        $ad->language_id = $request->language_id;
        $ad->save();
        return redirect()->route('ad.index')->with('success_message', 'Ad "'.$ad->title.'" Successfully created.');
 
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('ad.show', ['ad' => $ad]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        $languages = Language::all();
        return view('ad.edit', ['ad' => $ad, 'languages' => $languages]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $validator = Validator::make($request->all(),
       [
           'ad_title' => ['required', 'min:5', 'max:64'],
           'ad_description' => ['required', 'min:5', 'max:1000'],
           'ad_salary' => ['required', 'integer', 'min:1', 'max:10000'],
           'ad_area1' => ['required', 'min:3', 'max:30'],
           'ad_area2' => ['max:10000'],
           'ad_area3' => ['max:10000'],
           'ad_area4' => ['max:10000'],
           'ad_area5' => ['max:10000'],

       ],
        [
            'ad_title.required' => 'Title field cannot be empty!',
            'ad_title.min' => 'Title too short!',
            'ad_title.max' => 'Title too long!',
            'ad_description.required' => 'Description field cannot be empty!',
            'ad_description.min' => 'Description too short!',
            'ad_description.maz' => 'Description too long!',
            'ad_salary.required' => 'Salary field cannot be empty!',
            'ad_salary.min' => 'Salary too short!',
            'ad_salary.integer' => 'Salary must be numbers only!',
            'ad_salary.maz' => 'Salary too long!',
            'ad_area1.required' => 'Job areas 1 field cannot be empty',
            'ad_area1.min' => 'Job areas 1 too short!',
            'ad_area1.maz' => 'Job areas 1 too long!',
            'ad_area2.maz' => 'Job areas 2 too long!',
            'ad_area3.maz' => 'Job areas 3 too long!',
            'ad_area4.maz' => 'Job areas 4 too long!',
            'ad_area6.maz' => 'Job areas 5 too long!',
        ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $ad->title = $request->ad_title;
        $ad->description = $request->ad_description;
        $ad->salary = $request->ad_salary;
        $ad->area1 = $request->ad_area1;
        $ad->area2 = $request->ad_area2;
        $ad->area3 = $request->ad_area3;
        $ad->area4 = $request->ad_area4;
        $ad->area5 = $request->ad_area5;
        $ad->language_id = $request->language_id;
        $ad->save();
        return redirect()->route('ad.index')->with('info_message', 'Ad "'.$ad->title.'" Successfully updated.');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ad.index')->with('success_message', 'Ad "'.$ad->title.'" Successfully deleted.');
    }

    public function search(Ad $ad, Request $request){

        $search = $request->input('search');

        $ads = Ad::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();
        

        return view('ad.search', compact('ads'), ['ad' => $ad]);
    }
}
