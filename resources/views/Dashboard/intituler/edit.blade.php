@extends('BaseDash')

@section('titre', 'Modifier un intituler')

@section('head')

@endsection

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="rounded bg-white shadow-md dark:bg-gray-800 p-4">
            <form action="{{ route('dash.updateInt', $reparation->id) }}" method="post">
                @csrf
                @method('put')
                <p>Modifier l'intituler</p>
                @error('type')
                    <div
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mt-4">
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">type</label>
                    <input type="text" name="type" id="type" value="{{ $reparation->type }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
