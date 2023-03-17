@extends('layouts.dashboard')

@section('content')
    @if (session('error_message'))
        @include('partials.error_message', ['message' => session('error_message')])
    @endif

    <div class="w-full max-w-md m-auto mb-10">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-200">
            <div class="box-header mb-6">
                <div class="w-28 h-28 rounded-full bg-blue-default m-auto flex items-center justify-center text-white shadow">
                    <i class="fa fa-user text-5xl"></i>
                </div>
                <h1 class="text-center text-2xl mt-4 capitalize">
                    {{ $author['first_name'] ?? null }} {{ $author['last_name'] ?? null }}
                </h1>
            </div>

            <div>
                <div class="capitalize mt-2">
                    <strong>Gender:</strong> {{ $author['gender'] ?? '-' }}
                </div>
                <div class="capitalize mt-2">
                    <strong>Birthday:</strong> {{ (isset($author['birthday'])) ? \Carbon\Carbon::parse( $author['birthday'] )->format('Y-m-d') : '-' }}
                </div>
                <div class="capitalize mt-2">
                    <strong>Place Of Birth:</strong> {{ $author['place_of_birth'] ?? '-' }}
                </div>
                <div class="capitalize mt-2">
                    <strong>Biography:</strong> {{ $author['strong'] ?? '-' }}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <div class="books-header-sextion bg-white py-4 px-6 rounded border shadow-sm relative">
            <h1 class="text-3xl">Books</h1>
            <div class="action-bar absolute right-0">
                <a href="{{route('books.create')}}" class="cursor-pointer mr-2 p-2 px-3 hover:bg-gray-200 rounded text-3xl">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="books-list grid grid-cols-3 gap-4">
            @foreach ($author['books'] ?? [] as $book)

                @include('partials.book', ['book' => $book])

            @endforeach
        </div>
    </div>

@endsection
