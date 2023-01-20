@extends('layouts.app')

@section('content')
    <h1>登録画面</h1>
    {{-- <a class="btn btn-light btn-sm" href={{ route('member.create') }}>新規登録</a> --}}
    <ul class="w-50 list-group list-group-flush">
        <li class="list-group-item">name
            <input class="w-100" type="text" name="name" id="name">
        </li>
        <li class="list-group-item">mail
            <input class="w-100" type="email" name="mail" id="mail">
        </li>
        <li class="list-group-item">age
            <input class="w-100" type="number" name="age" id="age">
        </li>
        <li class="list-group-item">gender
            <input class="w-100" type="radio" name="gender" id="gender">
        </li>
    </ul>
    {{-- @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->mail }}</td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href={{ route('member.edit', $member->id) }}>更新</a>
                        <a class="btn btn-danger btn-sm" href={{ route('member.destroy', $member->id) }}>削除</a>
                    </td>
                </tr>
            @endforeach --}}
@endsection
