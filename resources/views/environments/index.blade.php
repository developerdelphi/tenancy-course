@extends('layouts.app')

@section('title')
Lista de Ambientes
@endsection

@section('content')
<div>
    <h1>Lista de Ambientes</h1>
    <div>
        @forelse ($environments as $environment )
        <div>
            {{ $environment->id }}
        </div>
        @empty
        <h2>Não existem Ambientes cadastrados</h2>
        @endforelse
    </div>
</div>
@endsection
