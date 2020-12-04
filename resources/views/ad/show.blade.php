<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header')



@section('content')


<div class=" flex items-center justify-center h-screen">
    <div class="container">
      <div class=" bg-white rounded-lg shadow-lg px-5 pt-4  mx-12">
        <div class="text-center">
          <h2 class=" tracking-tight leading-10 font-extrabold text-gray-900 sm:text-3xl sm:leading-none md:text-4xl">
            <span class="text-indigo-600">{{ $ad->title }}</span>
          </h2>
          <h3 class='text-xl md:text-3xl mt-10'>Job description</h3>
          <p class="text-base md:text-base mt-5">{{ $ad->description }}</p>
          <h3 class='text-xl md:text-1xl mt-3'>Language: {{ __($ad->adLanguage->language) }}</h3>
          <h3 class='text-xl md:text-2xl mt-4'>Job areas: </h3>
        </div>
        <div class="flex flex-wrap  justify-center">
           
          <div class="m-3">
              <span class="mx-auto text-purple-800">{{$ad->area1}}</span>
          </div>
          <div class="m-3">
              <span class="mx-auto text-purple-800">{{$ad->area2}}</span>
          </div>
          <div class="m-3">
              <span class="mx-auto text-purple-800">{{$ad->area3}}</span>
          </div>
          <div class="m-3">
            <span class="mx-auto text-purple-800">{{$ad->area4}}</span>
          </div>
          <div class="m-3">
            <span class="mx-auto text-purple-800">{{$ad->area5}}</span>
          </div>
        </div>
        <div class="text-center">
            <h3 class='text-xl md:text-2xl mt-4'>Salary: {{$ad->salary}} €</h3>
        </div>
      <div class="flex flex-wrap pb-8 justify-center">
        <td class="shadow  rounded-lg py-3 px-4"><a href="{{ route('ad.index', [$ad]) }}"><button
            class="shadow-md  rounded-lg  bg-blue-600 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Back</button></a>
        </td>
      </div>
      </div>
    </div>
  </div>



@endsection