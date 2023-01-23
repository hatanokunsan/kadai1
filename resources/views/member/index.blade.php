@extends('layouts.app')

@section('content')
    <h1>一覧画面</h1>
    <a class="btn btn-outline-primary btn-sm" href={{ route('member.create') }}>新規登録</a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>mail</th>
                <th>age</th>
                <th>gender</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->mail }}</td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href={{ route('member.edit', $member) }}>更新</a>
                        <a class="btn btn-danger btn-sm" href={{ route('member.destroy', $member) }}>削除</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
