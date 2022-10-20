<x-layouts.main-layout title="{{ $book->title }}">
  <div class="p-20 ">
    <div class="px-5 w-[30rem] bg-base-100 shadow-xl space-y-5">
      <p class="text-center font-bold">{{ $book->title }}</p>
      <img class="w-96" src="{{$book->image ? asset('storage/' . $book->image) :asset('/images/no-image.png') }}" alt="">
      <p class="text-center">{!! nl2br(e($book->description)) !!}</p>
      <p class="">Nom de l'auteur : {{ $book->author }}</p>
      <p class="">Prix : {{ $book->price }}€</p>
      <p class="">Nombre de pages : {{ $book->nombre_pages }}</p>
    </div>
    @auth
      <div class="pt-4 flex space-x-5">
        <a class=" bg-green-600 text-white p-2 rounded-lg" href="{{ route('books.edit', $book->id) }}">Modifier</a>
        <x-btn-delete :item="$book" routeItem="books.destroy" />
      </div>
    @endauth
  </div>

</x-layouts.main-layout>
