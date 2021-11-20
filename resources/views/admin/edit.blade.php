@extends('layouts.app')

@section('title', 'Редактировать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Форма добавления новости</h5>
                        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="newsTitle">Заголовок:</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ $news->title }}">

                                <label for="newsText">Текст:</label>
                                <textarea name="text" id="newsText" class="form-control">{{ $news->text }}</textarea>

                                <label for="newsCategory">Категория:</label>
                                <select name="category_id" id="newsCategory"  class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if ($item['id'] == old('category')) selected @endif
                                        value="{{ $item['id'] }}">{{ $item['title'] }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           @if ($news->isPrivate == 1) checked @endif name="isPrivate" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="Изменить новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
