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
                        <h3 class="text-center">Новости</h3>
                        @forelse($news as $item)<a href="{{ route('news.one', $item->id) }}"> {{ $item->title }}</a>
                        <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/img/default.jpeg') }})"></div>
                        @empty
                            <p class="text-center">Нет новостей</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
