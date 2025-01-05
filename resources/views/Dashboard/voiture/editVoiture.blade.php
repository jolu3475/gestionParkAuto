<div class="rounded bg-white shadow-md dark:bg-gray-800 p-4 mt-5">
    <form action="{{ route('dash.editVoiture', $voiture->id) }}" method="post">
        @csrf
        @method('put')
        <p>Modifier la voiture</p>
        <div class="mt-4">
            <label for="plaque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">plaque</label>
            <input type="text" name="plaque" id="plaque" value="{{ old('plaque', $voiture->plaque) }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mt-4">
            <label for="marque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">marque</label>
            <input type="text" name="marque" id="marque" value="{{ old('marque', $voiture->marque) }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mt-4">
            <label for="modele" class="block text-sm font-medium text-gray-700 dark:text-gray-300">modele</label>
            <input type="text" name="modele" id="modele" value="{{ old('model', $voiture->modele) }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        @error('utilisateur')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="utilisateur"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">utilisateur</label>
            <input type="text" name="utilisateur" id="utilisateur"
                value="{{ old('utilisateur', $voiture->utilisateur) }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        @error('etat')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="etat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">etat</label>
            <select name="etat"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="etat">
                <option value="0">Sur cale</option>
                <option value="1">En marche</option>
                <option value="2">Condanné</option>
            </select>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
        </div>
    </form>
</div>
