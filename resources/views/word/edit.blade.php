@extends('layout.main')
@section('content')
    @livewire('admin.word.edit',['word' => $word])
@endsection
