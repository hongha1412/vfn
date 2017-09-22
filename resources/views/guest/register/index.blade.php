@extends('guest.layouts.master')
@section('title', 'Register Page')
@section('contents')
    <form action="{{ route('guest.register') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="fullname" />
        <input type="text" name="email" />
        <input type="text" name="username" />
        <input type="password" name="password" />
        <input type="password" name="password_confirmation" />
        <button type="submit">Submit</button>
    </form>
@endsection