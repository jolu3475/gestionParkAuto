<div class="rounded bg-white shadow-md dark:bg-gray-800 p-4 mt-5">
    <form action="{{ route('dash.editVoiture', $voiture->id) }}" method="post">
        @csrf
        @method('put')
        <p>Modifier la voiture</p>
        <div class="mt-4">
            <label for="plaque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">plaque</label>
            <input type="text" name="plaque" id="plaque" value="{{ $voiture->plaque }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mt-4">
            <label for="marque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">marque</label>
            <input type="text" name="marque" id="marque" value="{{ $voiture->marque }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mt-4">
            <label for="modele" class="block text-sm font-medium text-gray-700 dark:text-gray-300">modele</label>
            <input type="text" name="modele" id="modele" value="{{ $voiture->modele }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
        </div>
    </form>
</div>
