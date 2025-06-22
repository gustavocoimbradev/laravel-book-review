@extends('layout')

@section('title', 'List of books')

@section('content')


    <form method="GET" action="{{ route('books.index') }}" class="group flex my-4 rounded-md overflow-hidden">
        <input {{ request('title') ? 'autofocus' : '' }}
            class="placeholder:text-gray-400 flex-1 py-3 px-5 bg-white border-1 rounded-s-md border-gray-100 focus:border-indigo-600 focus:text-indigo-600 transition-all ease-in-out duration-300 focus:placeholder-indigo-600 placeholder:transition-all placeholder:duration-300 placeholder:ease-in-out"
            value="{{ request('title') }}" type="text" name="title" placeholder="Search by title" />
        <input type="hidden" name="filter" value="{{ request('filter') }}">
        <button
            class="min-w-[130px] bg-gray-600 group-focus-within:bg-indigo-600  text-white cursor-pointer transition-all ease-in-out duration-300  "
            type="submit">Search</button>
    </form>

    <div class="bg-white flex flex-wrap gap-5 px-5 border-1 border-gray-100 rounded-md">
        @php 
            $filters = [
                '' => 'Latest',
                'popular_last_month' => 'Popular Last Month',
                'popular_last_6months' => 'Popular Last 6 Months',
                'highest_rated_last_month' => 'Highest Rated Last Month',
                'highest_rated_last_6months' => 'Highest Rated Last 6 months'
            ];
        @endphp
        @foreach ($filters as $key => $label)
            <a href="{{ $key === '' ? route('books.index', ['title' => request('title')]) : route('books.index', ['filter' => $key, 'title' => request('title')]) }}" class="block py-4 text-gray-600 text-sm transition-all duration-300 ease-in-out {{ request('filter') === $key || $key === '' && !request('filter') ? 'text-indigo-600' : 'hover:text-black' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    @if (request('title'))
        <div class="flex items-center justify-between mt-5 mb-3">
            <span class="text-gray-600 text-sm">Showing {{ $books->count() }} {{ Str::plural('result', $books->count())}}</span>
            <a href="{{ route('books.index') }}" class="text-gray-600 text-sm">Reset criteria</a>
        </div>
    @endif


    <ul class="py-2 mt-2">
        @forelse ($books as $book)
            <li>
                <x-card class="transition-all duration-300 ease-in-out hover:border-indigo-600 group">
                    <a href="{{ route('books.show', $book) }}">
                        <div class="flex flex-wrap gap-4 items-center justify-between">
                            <div class="w-full flex-grow sm:w-auto flex flex-col">
                                <span
                                    class="font-medium text-gray-700 transition-all duration-300 ease-in-out group-hover:text-indigo-600">{{ $book->title }}</span>
                                <span
                                    class="text-gray-600 text-sm mt-1 transition-all duration-300 ease-in-out group-hover:text-indigo-600">by
                                    {{ $book->author }}</span>
                            </div>
                            <div class="flex flex-col w-[140px]">
                                <p
                                    class="font-medium text-gray-700 text-md transition-all duration-300 ease-in-out group-hover:text-indigo-600">
                                    {{ number_format($book->reviews_avg_rating, 1) }}
                                </p>
                                <div
                                    class="text-gray-700 text-sm transition-all duration-300 ease-in-out group-hover:text-indigo-600">
                                    out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                                </div>
                            </div>
                        </div>
                    </a>
                </x-card>
            </li>
        @empty
            <li class="mb-4">
                <div class="mb-4 bg-white border-1 border-gray-100 rounded-md py-4 px-5 block">
                    <p class="text-gray-700 text-md">No books found</p>
                </div>
            </li>
        @endforelse
    </ul>

@endsection