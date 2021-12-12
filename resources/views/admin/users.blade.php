@extends('layouts.app')

@section('title', 'Юзеры')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Пользователи</h2>

                    <div class="card-body">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Пользователь</th>
                                    <th scope="col">Привилегии</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->is_admin)
                                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-danger">Убрать из админов</a>
                                    @else
                                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Назначить
                                            админом</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                Нет пользователей
                            @endforelse
                            </tbody>
                        </table>
                    </div>
@endsection
