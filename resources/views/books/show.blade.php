@extends('layout')

@section('title', $book->title)

@section('content')

    <div class="mb-4">

        <div>
            <div class="mb-4 text-sm font-medium text-gray-600">by {{ $book->author }}</div>
        </div>
    </div>

    <div class="flex mt-6 mb-5 items-center gap-3">
        <div class="mr-2 text-xl font-medium text-gray-700">
            Submit a review
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 px-6 py-4 border-1 border-green-200 rounded-md text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 px-6 py-4 border-1 border-red-200 rounded-md text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @php $ratings = [1, 2, 3, 4, 5] @endphp

    <form method="POST" action="{{ route('reviews.store') }}" class="mt-5 flex flex-col gap-4 mb-5">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <fieldset>
            <select name="rating" class="bg-white p-4 border-1 border-gray-100 rounded-md w-full">
                @foreach ($ratings as $rating)
                    <option value="{{ $rating }}">{{ $rating }} {{ Str::plural('star', $rating) }}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <textarea name="review" class="w-full bg-white p-4 border-1 border-gray-100 resize-none rounded-md"></textarea>
        </fieldset>
        <fieldset>
            <x-button class="py-3 px-6 rounded-md w-full">Submit</x-button>
        </fieldset>
    </form>

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
                    <x-card class="flex items-center gap-5">
                        <h2
                            class="text-md text-gray-500 text-xl bg-gray-100 w-[60px] h-[60px] flex items-center justify-center rounded-full">
                            {{ number_format($review->rating, 1) }}
                        </h2>
                        <div class="flex-1">
                            <p class="text-gray-500">{{ $review->review }}</p>
                            <time class="text-[.7rem] text-gray-400">
                                {{ $review->created_at->format('M j, Y') }}
                            </time>
                        </div>
                    </x-card>
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