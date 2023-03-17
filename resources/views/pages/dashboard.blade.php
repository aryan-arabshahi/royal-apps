@extends('layouts.dashboard')

@section('content')
    @if (session('error_message'))
        @include('partials.error_message', ['message' => session('error_message')])
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-gray-500 text-gray-400">
            <thead class="uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Full Name</th>
                    <th scope="col" class="px-6 py-3">Birthday</th>
                    <th scope="col" class="px-6 py-3">Gender</th>
                    <th scope="col" class="px-6 py-3">Place Of Birth</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (is_array($authors['items'] ?? null) && $authors['items'])
                    @foreach ($authors['items'] as $author)
                        <tr class="bg-white border-b">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                @if (isset($author['first_name'], $author['last_name']))
                                    {{ "{$author['first_name']} {$author['last_name']} " }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4"> {{ \Carbon\Carbon::parse($author['birthday'])->format('Y-m-d') ?? null }} </td>
                            <td class="px-6 py-4"> {{ $author['gender'] ?? null }} </td>
                            <td class="px-6 py-4"> {{ $author['place_of_birth'] ?? null }} </td>
                            <td class="px-6 py-4 text-center">
                                <div class="inline-block">
                                    <form method="POST" action="{{ route('authors.delete', ['authorId' => $author['id'] ?? null]) }}">
                                        @csrf
                                        <div class="inline-block hover:bg-gray-200 rounded mr-2">
                                            <button type="block cursor-pointer">
                                                <i class="fa fa-trash p-2" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <a
                                    href="{{ route('authors.view', ['authorId' => $author['id']]) }}"
                                    class="cursor-pointer p-2 hover:bg-gray-200 rounded"
                                >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr class="bg-white border-b text-center">
                        <td colspan="100" class="py-3 text-l">No Data Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if (isset($authors['total_results']) && $authors['total_results'])
        @include(
            'partials.pagination',
            [
                'totalPages'  => $authors['total_pages'],
                'currentPage' => $authors['current_page'],
            ]
        )
    @endif

@endsection
