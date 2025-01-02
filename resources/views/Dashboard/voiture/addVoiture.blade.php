<div class="rounded bg-white shadow-md dark:bg-gray-800 p-4 mt-5">
    <form action="{{ route('dash.ajoutVoiture') }}" method="post">
        @csrf
        <p>Ajouter une nouvelle voiture</p>
        @error('plaque')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="plaque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">plaque</label>
            <input type="text" name="plaque" id="plaque" value="{{ Auth::user()->plaque }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        @error('marque')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="marque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">marque</label>
            <input type="text" name="marque" id="marque" value="{{ Auth::user()->marque }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        @error('modele')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="modele" class="block text-sm font-medium text-gray-700 dark:text-gray-300">modele</label>
            <input type="text" name="modele" id="modele" value="{{ Auth::user()->modele }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
        </div>
    </form>
</div>
