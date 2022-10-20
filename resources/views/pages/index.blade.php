<x-layouts.main-layout title="Accueil">
  <div class="p-20">
    <h1 class="text-xl font-bold py-5">Liste livres</h1>
    <div class=" overflow-x-auto">
      <table class="table w-full ">
        <thead class="">
          <tr>
            <th>
              Nom du livre
            </th>
            <th>
              Prix
            </th>
            <th>
              Auteur
            </th>
            <th class="text-center">
              Editer
            </th>
          </tr>
        </thead>
        @if ($books->count())
          @foreach ($books as $book)
            <tbody class="">
              <tr>
                <td class="">{{ $book->title }}</td>
                <td class="">{{ $book->price }}€</td>
                <td class="">{{ $book->author }}</td>
                <td class="hover:underline-offset-2 hover:underline text-center font-black "><a
                    href="books/{{ $book->id }}"><span class="bg-blue-400 p-2 rounded-md">Editer</span></a></td>
              </tr>
            </tbody>
          @endforeach
        @else
          <tbody>
            <tr>
              <td>No books</td>
            </tr>
          </tbody>
        @endif
      </table>
    </div>
    {{ $books->links() }}
  </div>

</x-layouts.main-layout>
