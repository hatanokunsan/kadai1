@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $sub_title }}</p>
    <form action={{ route('member.store') }} method="POST">
        @csrf
        <ul class="w-50 list-group list-group-flush">
            <li class="list-group-item">
                <label>name</label>
                <input class="w-100" type="text" name="name" id="name" value={{ old('name') }}>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <label>mail</label>
                <input class="w-100" type="email" name="mail" id="mail" value={{ old('mail') }}>
                @error('mail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <label>age</label>
                <input class="w-100" type="number" name="age" id="age" value={{ old('age') }}>
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <label>gender</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="male"
                            {{ old('gender') == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender1">male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="female"
                            {{ old('gender') == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender2">female</label>
                    </div>
                </div>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <input class="btn btn-primary btn-sm" type="submit" value="{{ $sub_title }}">
                <a class="btn btn-secondary btn-sm" href="{{ route('member.index') }}">戻る</a>
            </li>
        </ul>
    </form>

    {{-- // 2023_0130 以下、削除して問題ないか考え中 --}}
    {{-- <form action={{ $member->exists ? route('member.update', $member) : route('member.store') }} method="post">
        @csrf
        @if ($member->exists)
            @method('PATCH')
        @endif
        <ul class="w-50 list-group list-group-flush">
            <li class="list-group-item">
                <label>name</label>
                <input class="w-100" type="text" name="name" id="name" value={{ old('name', $member->name) }}>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <label>mail</label>
                <input class="w-100" type="email" name="mail" id="mail" value={{ old('mail', $member->mail) }}>
                @error('mail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <label>age</label>
                <input class="w-100" type="number" name="age" id="age" value={{ old('age', $member->age) }}>
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="list-group-item">
                <input class="btn btn-primary btn-sm" type="submit" value={{ $member->exists ? '更新登録' : '新規登録' }}>
                <a class="btn btn-secondary btn-sm" href="{{ route('member.index') }}">戻る</a>
            </li>
        </ul>
    </form> --}}
@endsection
