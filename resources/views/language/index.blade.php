<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.header')
@section('title', 'Languages') 
@section('content')

<div class="md:px-32 py-8 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
      
        <tr>
          <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Language</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Edite</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Delete</td>
        </tr>
      </thead>
      @foreach ($languages as $language)
    <tbody class="text-gray-700">
      <tr>
        <td class="shadow w-1/3 text-left py-3 px-4"><a href="{{route('language.edit',[$language])}}">{{$language->language}}</a></td>
        <td class="shadow text-left py-3 px-4"><a href="{{route('language.edit',[$language])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Edit</button></a></td>
        <td class="shadow text-left py-3 px-4"><form method="POST" action="{{route('language.destroy', [$language])}}">
          @csrf
          <button class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-1 mt-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
         </form>
        </td>
      </tr>
    </tbody>
    @endforeach
    </table>
  </div>
</div>
@endsection

