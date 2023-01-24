@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    @if (!empty($message))
        {{ $message }}
    @endif
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
                        <form action="{{ Route('member.destroy', $member->id) }}" method="post">
                            <a class="btn btn-primary btn-sm" href={{ route('member.edit', $member->id) }}>更新</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger btn-sm" type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
