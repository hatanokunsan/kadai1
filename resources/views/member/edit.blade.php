@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{$sub_title}}</p>
    <form action={{ route('member.update', $member->id) }} method="POST">
        @csrf
        @method('PATCH')
        <ul class="w-50 list-group list-group-flush">
            <li class="list-group-item">
                <label>name</label>
                <input class="w-100" type="text" name="name" id="name" value={{ old('name', $member->name) }}>
            </li>
            <li class="list-group-item">
                <label>mail</label>
                <input class="w-100" type="email" name="mail" id="mail" value={{ old('mail', $member->mail) }}>
            </li>
            <li class="list-group-item">
                <label>age</label>
                <input class="w-100" type="number" name="age" id="age" value={{ old('age', $member->age) }}>
            </li>
            <li class="list-group-item">
                <label>gender</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="male"
                            {{ $member->gender == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender1">male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="female"
                            {{ $member->gender == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender2">female</label>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <input class="btn btn-primary btn-sm" type="submit" value="更新登録">
            </li>
        </ul>
    </form>
@endsection
