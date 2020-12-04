<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header')



@section('content')






<div class="flex items-center justify-center w-full ">
    
	<div class=" w-6/12	 ">
		<form action="{{ route('ad.search') }}" method="GET">
      <div class="w-full h-10 pl-3 mt-4 pr-2 bg-white border rounded-full flex justify-between items-center relative">
        <input type="text" name="search" id="search" placeholder="Search for job title"
               class="appearance-none w-full outline-none focus:outline-none active:outline-none"/>
        <button type="submit" class="ml-1 outline-none focus:outline-none active:outline-none">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               viewBox="0 0 24 24" class="w-6 h-6">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </button>
      </div>
      </form>
	</div>
	
  </div>


{{-- <form action="{{ route('ad.search') }}" method="GET">
<div class="w-full h-10 pl-3 pr-2 bg-white border rounded-full flex justify-between items-center relative">
  <input type="text" name="search" id="search" placeholder="Search for job title"
         class="appearance-none w-full outline-none focus:outline-none active:outline-none"/>
  <button type="submit" class="ml-1 outline-none focus:outline-none active:outline-none">
    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
         viewBox="0 0 24 24" class="w-6 h-6">
      <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
    </svg>
  </button>
</div>
</form> --}}
  
{{-- <form action="{{ route('ad.search') }}" method="GET">
  <td>
    <input type="text" name="search" required/>
  </td>
  <td>
    <button type="submit">Search</button>
  </td>
</form> --}}


<form action="{{route('ad.index')}}" method="get">
  <div class="md:px-32 py-8 w-full">
    <div class="break-words overflow-x-auto shadow overflow-hidden rounded border-b border-gray-200">
      <table class="min-w-full bg-white">
        <tbody class="text-gray-700">
          <tr>
            <td class="shadow w-1/6 text-left py-3 px-4">ASC: <input type="radio" name="dir" value="asc" @if ('asc' == $order) checked @endif></td>
            <td class="shadow w-1/6 text-left py-3 px-4">DESC: <input type="radio" name="dir" value="desc" @if ('desc' == $order) checked @endif></td>
            <td class="shadow w-1/6 text-left py-3 px-4">Salary: <input type="radio" name="sort" value="salary" @if ('salary' == $sort) checked @endif></td>
            <td class="shadow w-1/6 text-left py-3 px-4">Title: <input type="radio" name="sort" value="title" @if ('title' == $sort) checked @endif"></td>
            <td class="shadow w-1/6 text-left py-3 px-4"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Sort</button></td>
            <td class="shadow w-1/6 text-left py-3 sm:w-1/6 px-4"><a class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{route('ad.index')}}">Resest</a></td>
            <td class="shadow w-1/6 text-left py-3 px-4"><select name="language_id">
              <option value="0">Show all</option>
              @foreach ($languages as $language)
                  <option value="{{ $language->id }}"@if ($language_id == $language->id) selected @endif> {{$language->language}}</option>
              @endforeach
          </select></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </form>




<div class="md:px-32 py-8 w-full">
  <div class="break-words overflow-x-auto shadow overflow-hidden rounded border-b border-gray-200">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
      
        <tr>
          <th class="w-1/9 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
          <th class="w-1/9 text-left py-3 px-4 uppercase font-semibold text-sm hidden md:table-cell">Description</th>
          <th class="w-1/9 text-left py-3 px-4 uppercase font-semibold text-sm">Salary</th>
          <th class="w-1/9 text-left py-3 px-4 uppercase font-semibold text-sm">Job areas</th>
          <th class="w-1/11 text-left py-3 px-4 uppercase font-semibold text-sm">Language</th>
          <th class="w-1/9 text-left py-3 px-4 uppercase font-semibold text-sm">Show</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Edite</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Delete</td>
        </tr>
      </thead>
      @foreach ($ads as $ad)
    <tbody class="text-gray-700">
      <tr>
        <td class="shadow w-1/9 text-left py-3 px-4"><a href="{{route('ad.edit',[$ad])}}">{{$ad->title}}</a></td>
        <td class="shadow w-1/9 text-left py-3 px-4 hidden md:table-cell"><a href="{{route('ad.edit',[$ad])}}">{{$ad->description}}</a></td>
        <td class="shadow w-1/9 text-left py-3 px-4"><a href="{{route('ad.edit',[$ad])}}">{{$ad->salary}} €</a></td>
        <td class="shadow w-1/9 text-left py-3 px-4"><a href="{{route('ad.edit',[$ad])}}">{{$ad->area1}} {{$ad->area2}} {{$ad->area3}} {{$ad->area4}} {{$ad->area5}}</a></td>
        <td class="shadow w-1/11 text-left py-3 px-4"><a href="{{route('ad.edit',[$ad])}}">{{$ad->adLanguage->language}}</a></td>
        <td class="shadow text-left py-3 px-4"><a href="{{route('ad.show',[$ad])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Show</button></a></td>
        <td class="shadow text-left py-3 px-4"><a href="{{route('ad.edit',[$ad])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Edit</button></a></td>
        <td class="shadow text-left py-3 px-4"><form method="POST" action="{{route('ad.destroy', [$ad])}}">
          @csrf
          <button class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-1 mt-4 rounded focus:outline-none focus:shadow-outline" type="submit">DELETE</button>
         </form>
        </td>
      </tr>
    </tbody>
    @endforeach
    </table>
    {{$ads->links()}}
  </div>
</div>
@endsection



