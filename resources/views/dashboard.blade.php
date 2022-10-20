<x-layouts.main-layout title="Dashboard">
  <div class="px-20 py-12">
    <h1 class="">Hi, {{ Auth::user()->name }}</h1>
    <div class="py-10 flex flex-col gap-3">
      <a class="" href="{{ route('books.create') }}"><span class="bg-teal-200">Ajouter livre</span></a>
      

      {{-- <a class="bg-teal-200" href="{{ route('videos.edit') }}">Modifier film</a> --}}

    </div>
  </div>
</x-layouts.main-layout>
