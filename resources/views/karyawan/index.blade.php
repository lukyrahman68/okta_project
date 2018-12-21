@extends('layouts.back_end')
@section('main')
    @if(Auth::user()->isAdmin())
    enter code here
    @endif
@endsection
