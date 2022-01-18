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
    <div>
        @forelse ($environments as $environment )
        <div class="flex flex-row items-center p-2 border shadow justify-between">
            <h3 class="text-lg font-semibold p-4">{{ $environment->id }}</h3>
            <div class="flex gap-2 items-center justify-between ">
                <div>
                    Database:{{ $environment->tenancy_db_name }}
                </div>
                <div>
                    Criação{{ $environment->created_at }}
                </div>
                <div class="p-2 w-40 flex flex-row justify-end gap-2">
                    <a class="bg-gray-400 text-gray-50 font-semibold p-2 shadow rounded-lg hover:bg-gray-600"
                        href="{{ route('environments.edit', ['environment'=>$environment->id]) }}">Editar</a>
                    <a class="bg-gray-400 text-gray-50 font-semibold p-2 shadow rounded-lg hover:bg-gray-600"
                        href="{{ route('environments.edit', ['environment'=>$environment->id]) }}">Domínio</a>
                </div>
            </div>
        </div>
        @empty
        <h2>Não existem Ambientes cadastrados</h2>
        @endforelse
    </div>
</div>
@endsection
