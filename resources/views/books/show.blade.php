@extends('layout')

@section('title', $book->title)

@section('content')

    <div class="mb-4">

        <div>
            <div class="mb-4 text-sm font-medium text-gray-600">by {{ $book->author }}</div>
        </div>
    </div>

    <div>
        <div class="flex mt-6 mb-5 items-center gap-3">
            <div class="mr-2 text-xl font-medium text-gray-700">
                {{ number_format($book->reviews_avg_rating, 1) }}
            </div>
            <span class="text-md text-gray-500">
                {{ $book->reviews_count }} {{ Str::plural('review', 5) }}
            </span>
        </div>
        <ul>
            @forelse ($book->reviews as $review)
                <li class="mb-4">
                    <div class="mb-4 bg-white border-1 border-gray-100 rounded-md py-4 px-5 flex items-center gap-5">
                        <h2
                            class="text-md text-gray-500 text-xl bg-gray-100 w-[60px] h-[60px] flex items-center justify-center rounded-full">
                            {{ number_format($review->rating, 1) }}</h2>
                        <div class="flex-1">
                            <p class="text-gray-500">{{ $review->review }}</p>
                            <time class="text-[.7rem] text-gray-400">
                                {{ $review->created_at->format('M j, Y') }}
                            </time>
                        </div>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div>
                        <p class="text-lg font-semibold">No reviews yet</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection