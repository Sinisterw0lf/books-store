@props(['item','routeItem'])
<div class="">
		<form action="{{ route($routeItem, $item->id) }}" method="POST"
				onsubmit="return confirm('Are you sure you want to delete this ?')">
				@csrf
				@method('DELETE')
				<button class="bg-red-600 text-white p-2 rounded-lg" type="submit">Supprimer</button>
		</form>
</div>