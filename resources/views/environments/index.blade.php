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
    <h1 class="text-3xl h-20 font-bold">Lista de Ambientes</h1>
    <div class="flex flex-col">
        @forelse ($environments as $environment )
        <div
            class="grid grid-flow-row auto-rows-max sm:grid-cols-1 gap-2 md:grid-cols-3 items-center p-2 border shadow w-full">
            <div class="md:col-span-2 flex items-center w-full">
                <h3 class="text-lg font-semibold p-4">{{ $environment->id }}</h3>
                <div class="flex flex-row gap-2 text-xs">
                    <div class="w-1/2">Database: <span class="font-semibold">{{ $environment->tenancy_db_name }}</span>
                    </div>

                    <div class="w-1/2">Criação: <span class="font-semibold">{{ $environment->created_at }}</span></div>
                </div>
            </div>
            <div class="flex flex-row justify-end">
                <div class="grid grid-cols-3 gap-0 justify-between bg-gray-400 h-8">
                    <a class="text-xs text-gray-50 font-semibold p-2 hover:bg-gray-600 h-8"
                        href="{{ route('environments.edit', ['environment'=>$environment->id]) }}">Editar</a>
                    <a class="text-xs text-gray-50 font-semibold p-2 hover:bg-gray-600 h-8"
                        href="{{ route('environments.edit', ['environment'=>$environment->id]) }}">Domínio</a>
                    <form action="{{ route('environments.destroy', ['environment'=>$environment->id]) }}" method="post"
                        class="p-0 m-0 h-8">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-xs text-gray-50 font-semibold p-2 hover:bg-gray-600">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <h2>Não existem Ambientes cadastrados</h2>
        @endforelse
    </div>
</div>
@endsection
