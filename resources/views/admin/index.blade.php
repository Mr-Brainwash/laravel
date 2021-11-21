@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">CRUD Новостей</h2>
                        @forelse($news as $item)
                            <h3>{{ $item->title }}</h3>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-outline-success" href="{{ route('admin.news.edit', $item) }}">edit</a>
                                <button class="btn btn-outline-danger">delete</button>
                            </form>
                            <br>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
