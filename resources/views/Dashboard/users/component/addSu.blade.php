<div class="mt-4 mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">
    <form action="{{ route('dash.users.addSu', $user->id) }}" method="post">
        @csrf
        <div class="flex justify-between">
            @if ($user->su)
                <p>Retirer des super administrateur</p>
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Retirer</button>
            @else
                <p>ajouter en temps que super administrateur</p>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
            @endif
        </div>
    </form>
</div>
