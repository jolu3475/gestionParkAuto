<div class="mt-4 mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">
    <form action="{{ route('dash.users.deleteUser', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <div class="flex justify-between">
            <p>Supprimer l'utilisateur</p>
            <button type="submit">Supprimer</button>
        </div>
    </form>
</div>
