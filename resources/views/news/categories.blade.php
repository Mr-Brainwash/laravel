@extends('layouts.app')

@section('title', 'Категории')

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @forelse($categories as $category)
                            <a href="{{ route('news.category.show', $category->slug) }}"><h2 class="text-center">{{ $category->title }}</h2></a>
                        @empty
                            <p class="text-center">Нет категорий</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
