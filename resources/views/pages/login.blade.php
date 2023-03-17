@extends('layouts.auth')

@section('content')

    <div class="w-full max-w-xs m-auto mt-28 mb-10">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-200">
            <div class="box-header mb-10">
                <div class="w-28 h-28 rounded-full bg-blue-default m-auto flex items-center justify-center text-white shadow">
                    <i class="fa fa-user text-5xl"></i>
                </div>
            </div>
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-3">
                    @include('partials.form.input', ['name' => 'email', 'type' => 'text', 'label' => 'Email'])
                </div>
                <div class="mb-3">
                    @include('partials.form.input', ['name' => 'password', 'type' => 'password', 'label' => 'Password'])
                </div>
                <div class="flex items-center justify-between mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 cursor-default">
                    Forgot Password?
                    </a>
                </div>
            </form>
        </div>
        <p class="text-center text-gray-500 text-xs">
            &copy;2023 Aryan Arabshahi. All rights reserved.
        </p>
    </div>

@endsection
