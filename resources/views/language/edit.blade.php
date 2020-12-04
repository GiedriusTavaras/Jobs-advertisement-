<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header') 
@section('content')

{{-- <form method="POST" action="{{route('language.update',[$language->id])}}">
    Language: <input type="text" name="language_language" value="{{$language->language}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @csrf
    <button type="submit">EDIT</button>
 </form> --}}


 
 <form method="POST" action="{{route('language.update',[$language->id])}}">
    <div class="mx-3 mt-3 shadow-lg card bg-white max-w-xl p-6 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Update Language</h1>
        </div>
        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="maker" class="font-bold mt-1">Language</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="language_language" value="{{ old('language_language', $language->language) }}"
                    placeholder="Enter a language">
            </div>
        </div>
        <div class="submit">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            <button type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-7 text-center font-semibold focus:outline-none ">Edit</button>
        </div>
    </div>
</form>

@endsection