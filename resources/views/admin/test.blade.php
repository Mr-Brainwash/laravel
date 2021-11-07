@extends('layouts.app')

@section('title')
    @parent Тест
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Тест</h3>
            </div>
        </div>
    </div>
@endsection
