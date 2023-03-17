<div class="w-full my-7">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-200">
        <div class="box-header mb-6">
            <div class="w-28 h-28 rounded-full bg-blue-default m-auto flex items-center justify-center text-white shadow">
                <i class="fa fa-book text-5xl"></i>
            </div>
            <h1 class="text-center text-2xl mt-4 capitalize">
                {{ $book['title'] ?? '-' }}
            </h1>
        </div>

        <div>
            <div class="capitalize mt-2">
                <strong>release date:</strong> {{ (isset($book['release_date'])) ? \Carbon\Carbon::parse( $book['release_date'] )->format('Y-m-d') : '-' }}
            </div>
            <div class="capitalize mt-2">
                <strong>isbn:</strong> {{ $book['isbn'] ?? '-' }}
            </div>
            <div class="capitalize mt-2">
                <strong>format:</strong> {{ $book['format'] ?? '-' }}
            </div>
            <div class="capitalize mt-2">
                <strong>number of pages:</strong> {{ $book['number_of_pages'] ?? '-' }}
            </div>
            <div class="capitalize mt-2">
                <strong>description:</strong> {{ $book['description'] ?? null }}
            </div>
        </div>

        <form method="POST" action="{{ route('books.delete', ['bookId' => $book['id'] ?? null]) }}">
            @csrf
            <div class="flex items-center justify-between mt-4">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-6 w-full" type="submit">
                    Delete
                </button>
            </div>
        </form>

    </div>
</div>
