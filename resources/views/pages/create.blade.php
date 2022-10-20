@php
  $style = 'rounded-lg w-full block mb-3';
@endphp

<x-layouts.main-layout title="Nouveau livre">
  <div class="p-20 ">
    <h1>Enregister un nouveau livre</h1>
    <div>
      <form class="space-y-5" enctype="multipart/form-data" action="{{ route('books.store') }}" method="post">
        @csrf
        <div>
          <input class="{{ $style }}" type="text" name="title" placeholder="Nom du livre :"
            value="{{ old('title') }}">
          <x-error-msg name="title" />
        </div>
        <div>
          <input class="{{ $style }}" type="file" name="image" placeholder="Votre image d'illustration :">
          <x-error-msg name="image" />
        </div>
        <div>
          <textarea class="{{ $style }}" name="description" id="" cols="30" rows="10"
            placeholder="Description du livre : ">{{ old('description') }}</textarea>
          <x-error-msg name="description" />
        </div>
        <div>
          <input class="{{ $style }}" type="text" name="author" placeholder="Nom de l'auteur :"
            value="{{ old('author') }}">
          <x-error-msg name="author" />
        </div>
        <div>
          <input class="{{ $style }}" type="number" min="0.00" max="10000.00" step="0.01" name="price"
            placeholder="Prix du livre :" value="{{ old('price') }}">
          <x-error-msg name="price" />
        </div>
        <div>
          <input class="{{ $style }}" type="number" min="1" max="9999" step="1"
            name="nombre_pages" placeholder="Nombre de pages :" value="{{ old('nombre_pages') }}">
          <x-error-msg name="nombre_pages" />
        </div>
        <button type="submit" class="bg-indigo-500 p-2 text-white rounded-lg">Envoyer</button>
      </form>
    </div>
  </div>
</x-layouts.main-layout>
