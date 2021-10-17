@extends('admin.main')

@section('content')
Hello! {{auth()->user()->name}}
@endsection
