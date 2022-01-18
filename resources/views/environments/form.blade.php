@extends('layouts.app')

@section('title')
Lista de Ambientes
@endsection

@section('menu-page')
<div class="flex flex-row px-4">
    <a class="text-lg font-semibold p-2 bg-gray-300 text-gray-700 hover:bg-gray-600 hover:text-gray-100"
        href="{{ route('environments.index') }}">Ambientes</a>
    <a class="text-lg font-semibold p-2 bg-gray-300 text-gray-700 hover:bg-gray-600 hover:text-gray-100"
        href="{{ route('environments.create') }}">Cadastrar</a>
</div>
@endsection

@section('content')
<div class="m-4">
    <h1 class="text-3xl h-20 font-bold">Registro de Ambientes</h1>
    <div class="p-4 mx-auto w-full block p-6 rounded-lg shadow-lg bg-white max-w-lg">
        <form action="{{ route('environments.store') }}" method="post"
            class="block p-6 rounded-lg shadow-lg bg-white max-w-lg">
            @csrf
            <div class="form-group mb-6">
                <input type="text" name="id" value="{{ old('id') }}"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="environment_id" placeholder="Ambiente">
                @if ($errors->has('id'))
                @foreach ($errors->get('id') as $message)
                <span class="text-red-500 font-italic text-xs px-2">{{ $message }}</span>
                @endforeach
                @endif
            </div>

            <div class="form-group mb-6">
                <input type="text" name="domain" value="{{ old('domain') }}"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="domain" placeholder="Domínio da Aplicação">
                @if ($errors->has('domain'))
                @foreach ($errors->get('domain') as $message)
                <span class="text-red-500 font-italic text-xs px-2">{{ $message }}</span>
                @endforeach
                @endif
            </div>
            <button type="submit"
                class="w-full px-6 py-2.5 bg-gray-600 text-white font-semibold leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline- none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                Salvar
            </button>
        </form>
    </div>
</div>

@endsection
