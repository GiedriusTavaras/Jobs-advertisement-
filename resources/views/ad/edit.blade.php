<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header') 
@section('content')

{{-- <form method="PUT" action="{{route('ad.update',[$ad])}}">
    Title: <input type="text" name="ad_title" value="{{$ad->title}}">
    Description: <textarea name="ad_description">{{$ad->description}}"</textarea>
    Salary: <input type="text" name="ad_salary" value="{{$ad->salary}}">
    area1: <input type="text" name="ad_area1" value="{{$ad->area1}}">
    area2: <input type="text" name="ad_area2" value="{{$ad->area2}}">
    area3: <input type="text" name="ad_area3" value="{{$ad->area3}}">
    area4: <input type="text" name="ad_area4" value="{{$ad->area4}}">
    area5: <input type="text" name="ad_area5" value="{{$ad->area5}}">
    <select name="language_id">
        @foreach ($languages as $language)
            <option value="{{$language->id}}" @if($language->id == $ad->language_id) selected @endif>
                {{$language->language}} 
            </option>
        @endforeach
</select>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @csrf
    <button type="submit">EDIT</button>
</form> --}}



<form method="POST" action="{{route('ad.update',[$ad])}}">
    <div class="mx-3 mt-3 shadow-lg card bg-white max-w-xl p-6 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Update Ad</h1>
        </div>
        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="maker" class="font-bold mt-1">Title</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_title" value="{{ old('ad_title', $ad->title) }}"
                    placeholder="Enter a title">
            </div>
            <div class="text-sm flex flex-col">
                <label for="description" class="font-bold mt-4 mb-2">Aad description</label>
                <textarea
                class="ckeditor summernote shadow-md appearance-none w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                name="ad_description">{{ old('ad_description', $ad->description) }}</textarea>
            </div>  `
            <div class="flex flex-col text-sm">
                <label for="maker" class="font-bold mt-2">Salary</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_salary" value="{{ old('ad_salary', $ad->salary) }}" placeholder="ad salary">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.1</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_area1" value="{{ old('ad_area1', $ad->area1) }}"
                    placeholder="Ad area 1">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.2</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_area2" value="{{ old('ad_area1', $ad->area2) }}"
                    placeholder="Ad area 2">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.3</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_area3" value="{{ old('ad_area3', $ad->area3) }}"
                    placeholder="Ad area 3">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.4</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_area4" value="{{ old('ad_area4', $ad->area4) }}"
                    placeholder="Ad area 4">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.5</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="ad_area5" value="{{ old('ad_area5', $ad->area5) }}"
                    placeholder="Ad area 5">
            </div>
            
            <div class="shadow-md flex flex-col text-sm">
                <label for="description" class="font-bold mt-4 mt-2">Language: </label>
                <select name="language_id">
                    @foreach ($languages as $language)
                        <option value="{{$language->id}}" @if($language->id == old('language_id', $ad->language_id) ) selected @endif>{{$language->language}} </option>
                    @endforeach
                </select>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @csrf
            </div>
        </div>
        <div class="submit">
            <button type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-7 text-center font-semibold focus:outline-none ">Edit</button>
        </div>
    </div>
</form>

@endsection