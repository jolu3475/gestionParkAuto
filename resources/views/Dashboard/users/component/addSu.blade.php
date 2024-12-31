<div class="mt-4 mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">
    <form action="{{ route('dash.users.addSu', $user->id) }}" method="post">
        @csrf
        <div class="flex justify-between">
            @if ($user->su)
                <p>Retirer des super administrateur</p>
                <button type="submit">Retirer</button>
            @else
                <p>ajouter en temps que super administrateur</p>
                <button type="submit">Ajouter</button>
            @endif
        </div>
    </form>
</div>
