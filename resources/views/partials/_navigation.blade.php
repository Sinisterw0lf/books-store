<div class="bg-cyan-500 text-gray-200">
  <div class="px-20 py-6 flex justify-between">
    <div>
      <a href="/">
        <span class="uppercase font-black">BooksStore</span>
      </a>

    </div>
    <div class="space-x-4 flex">
      @guest
        <a href="{{ route('register') }}">Inscription</a>
        <a href="{{ route('login') }}">Connexion</a>
      @endguest
      @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <x-btn-logout/>
      @endauth
    </div>
  </div>
</div>