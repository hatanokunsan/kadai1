@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $sub_title }}</p>
    <form action="{{ $member->exists ? route('member.update', $member) : route('member.store') }}" method="POST">
        @csrf
        @if ($member->exists)
            @method('PATCH')
        @endif
        <ul class="w-50 list-group list-group-flush">
            <li class="border-0 bg-transparent list-group-item">
                <label for="id">id:
                    {{ $member->id ?? '' }}
                </label>
            </li>
            <li class="border-0 bg-transparent list-group-item">
                <label for="name">name:</label>
                <input class="w-100" type="text" name="name" id="name" value="{{ old('name', $member->name) }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="border-0 bg-transparent list-group-item">
                <label for="mail">mail:</label>
                <input class="w-100" type="email" name="mail" id="mail" value="{{ old('mail', $member->mail) }}">
                @error('mail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="border-0 bg-transparent list-group-item">
                <label for="age">age:</label>
                <input class="w-100" type="number" name="age" id="age" value="{{ old('age', $member->age) }}">
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </li>
            <li class="border-0 bg-transparent list-group-item">
                <label>gender:</label>
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
            <li class="border-0 bg-transparent list-group-item">
                <input class="btn btn-primary btn-sm" type="submit" value="{{ $sub_title }}">
                <a class="btn btn-secondary btn-sm" href="{{ route('member.index') }}">戻る</a>
            </li>
        </ul>
    </form>
@endsection
