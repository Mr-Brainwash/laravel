@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Новости</h2>
                        <ul class="list-group">
                        @forelse($news as $item)
                                <li class="list-group-item"><a href="{{ route('news.one', $item['id']) }}"> {{ $item['title'] }}</a></li>
                        @empty
                                <li class="list-group-item">Нет новостей</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
