<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header') 
@section('content')

{{-- <form method="POST" action="{{route('ad.store')}}">
    Title: <input type="text" name="ad_title">
    Description: <textarea name="ad_description"></textarea>
    Salary: <input type="text" name="ad_salary">
    area1: <input type="text" name="ad_area1">
    area2: <input type="text" name="ad_area2">
    area3: <input type="text" name="ad_area3">
    area4: <input type="text" name="ad_area4">
    area5: <input type="text" name="ad_area5">
    <select name="language_id">
        @foreach ($languages as $language)
            <option value="{{$language->id}}">{{$language->language}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form> --}}
 




 <form method="POST" action="{{route('ad.store')}}">
    <div class="mx-4 mt-4 shadow-lg card bg-white max-w-xl p-6 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Create new Ad</h1>
        </div>
        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-1">Title</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_title') }}" name="ad_title" placeholder="Enter a title">
            </div>
            <div class=" text-sm flex flex-col">
                <label for="description" class="font-bold mt-4 mt-2">Description</label>
                <textarea
                    class="ckeditor summernote shadow-md appearance-none w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    name="ad_description" value="{{ old('ad_description') }}" placeholder="Enter your description"
                    id="summernote"></textarea>       
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Salary</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_salary') }}" name="ad_salary" placeholder="ad salary">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.1</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_area1') }}" name="ad_area1" placeholder="Ad area 1">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.2</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_area2') }}" name="ad_area2" placeholder="Ad area 2">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.3</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_area3') }}" name="ad_area3" placeholder="Ad area 3">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.4</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_area4') }}" name="ad_area4" placeholder="Ad area 4">
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-2">Area nr.5</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('ad_area5') }}" name="ad_area5" placeholder="Ad area 5">
            </div>

            <div class="shadow-md flex flex-col text-sm">
                <label for="description" class="font-bold mt-4 mt-2">Language: </label>
                <select name="language_id">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}" @if($language->id == old('language_id')) selected @endif>
                            {{$language->language}} 
                        </option>
                    @endforeach
                </select>
                @csrf
            </div>
        </div>
        <div class="submit">
            <button type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Add</button>
        </div>
    </div>
</form>

@endsection