<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header') 
@section('content')


{{-- <form method="POST" action="{{route('language.store')}}">
    Language: <input type="text" name="language_language">
    @csrf
    <button type="submit">ADD</button>
 </form> --}}
 
 {{-- @endsection  --}}


 <form method="POST" action="{{route('language.store')}}">
    <div class="mx-4 mt-4 shadow-lg card bg-white max-w-xl p-6 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Create new Language</h1>
        </div>
        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mt-1">Lanaguage</label>
                <input
                    class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" value="{{ old('language_language') }}" name="language_language" placeholder="Enter a language">
            </div>
        </div>
        <div class="submit">
            @csrf
            <button type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Add</button>
        </div>
    </div>
</form>

@endsection 