@extends('layout.main')
@section('content')
    @livewire('admin.word.show',['word'=>$word])
@endsection
