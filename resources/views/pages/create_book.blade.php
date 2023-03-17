@extends('layouts.dashboard')

@section('content')

    <div class="mt-2 mb-5">
        <div class="books-header-sextion bg-white py-4 px-6 rounded border shadow-sm relative">
            <h1 class="text-3xl">Create Book</h1>
        </div>

        <div class="mt-5">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-200">
                <div style="width: 500px;">
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf
                        <div class="mb-3">
                            @include('partials.form.selectbox', ['name' => 'author_id', 'label' => 'Author', 'options' => $authors])
                        </div>
                        <div class="mb-3">
                            @include('partials.form.input', ['name' => 'title', 'type' => 'text', 'label' => 'Title'])
                        </div>
                        <div class="mb-3">
                            @include('partials.form.input', ['name' => 'release_date', 'type' => 'text', 'label' => 'Release Date'])
                        </div>
                        <div class="mb-3">
                            @include('partials.form.input', ['name' => 'description', 'type' => 'text', 'label' => 'Description'])
                        </div>
                        <div class="mb-3">
                            @include('partials.form.input', ['name' => 'isbn', 'type' => 'text', 'label' => 'Isbn'])
                        </div>
                        <div class="mb-3">
                            @include('partials.form.input', ['name' => 'format', 'type' => 'text', 'label' => 'Format'])
                        </div>
                        <div class="mb-3">
                            @include('partials.form.input', ['name' => 'number_of_pages', 'type' => 'text', 'label' => 'Number Of Pages'])
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
