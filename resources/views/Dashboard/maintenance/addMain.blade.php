<div class="rounded bg-white shadow-md dark:bg-gray-800 p-4 mt-5">
    <form action="{{ route('dash.addMain') }}" method="post">
        @csrf
        <p>Ajouter une Reparation</p>
        @error('voiture_id')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="voiture_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="voiture_id" name="voiture_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Veuiller choisir la voiture</option>
                @foreach ($voitures as $voiture)
                    <option value="{{ $voiture->id }}">{{ $voiture->plaque }}</option>
                @endforeach
            </select>
        </div>
        @error('reparation_id')
            <div
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de
                reparation</label>
            <select id="reparation_id" name="reparation_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Veuiller choisir la voiture</option>
                @foreach ($reparations as $reparation)
                    <option value="{{ $reparation->id }}">{{ $reparation->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
        </div>
    </form>
</div>
