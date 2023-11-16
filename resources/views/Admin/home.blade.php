@extends('admin.main')

@section('content')
    <h1>Xin chao {{ Auth::user()->name }}</h1>
@endsection
