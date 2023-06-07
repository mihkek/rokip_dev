@extends('admin._email.layout')

@section('content')
    <p>&nbsp;</p>
    <p class="orange-text" style="color: orange; font-size: 28px; text-align: center; font-family: 'Times New Roman'">
        Данные для входа на <a href="{{ route('login') }}">ROCIP</a><br>
        Ваш логин: <span class="text-primary">{{ $user->email }}</span><br>
        Ваш пароль: <span class="text-primary">{{ $user->visible_password }}</span>
    </p>
    <p>&nbsp;</p>
@endsection
