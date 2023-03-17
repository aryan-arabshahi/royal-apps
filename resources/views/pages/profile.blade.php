@extends('layouts.dashboard')

@section('content')
    <div class="books-header-sextion bg-white py-4 px-6 rounded border shadow-sm relative">
        <h1 class="text-3xl">User Profile</h1>
    </div>

    @if (session('error_message'))
        @include('partials.error_message', ['message' => session('error_message')])
    @endif

    <div class="w-full max-w-md m-auto my-10">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-200">
            <div class="box-header mb-6">
                <div class="w-28 h-28 rounded-full bg-blue-default m-auto flex items-center justify-center text-white shadow">
                    <i class="fa fa-user text-5xl"></i>
                </div>
                <h1 class="text-center text-2xl mt-4 capitalize">
                    {{ $user['first_name'] ?? null }} {{ $user['last_name'] ?? null }}
                </h1>
            </div>

            <div>
                <div class="capitalize mt-2">
                    <strong>Gender:</strong> {{ $user['gender'] ?? '-' }}
                </div>
                <div class="capitalize mt-2">
                    <strong>email:</strong> {{ $user['email'] ?? '-' }}
                </div>
                <div class="capitalize mt-2">
                    <strong>active:</strong> {{ ($user['active'] ?? false) ? 'Yes' : 'No' }}
                </div>
                <div class="capitalize mt-2">
                    <strong>roles:</strong> {{ (is_array($user['roles'] ?? null)) ? implode(', ', $user['roles']) : '-' }}
                </div>
            </div>
        </div>
    </div>

@endsection
