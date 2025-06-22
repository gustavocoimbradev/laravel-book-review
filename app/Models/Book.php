<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->withCount('reviews')
            ->orderBy('reviews_count', 'DESC');
    }

    public function scopeHighestRated(Builder $query): Builder
    {
        return $query
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->whereRaw('(SELECT COUNT(*) FROM reviews WHERE reviews.book_id = books.id) >= 10')
            ->orderByDesc('reviews_avg_rating');
    }

    private function dateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to) {
            $query->where('created_at', '>=', 'from');
        } elseif (!$from && $to) {
            $query->where('created_at', '<=', 'to');
        } elseif ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }
    }

    public function scopePopularLastMonth(Builder $query): Builder
    {
        return $query->popular(now()->subMonth(), now())
            ->highestRated(now()->subMonth(), now())
            ->minReviews(2);
    }

    public function scopeMinReviews(Builder $query, int $min): Builder
    {
        return $query->whereRaw('
        (SELECT COUNT(*) FROM reviews WHERE reviews.book_id = books.id) >= ?
    ', [$min]);
    }

    public function scopePopularLast6Months(Builder $query): Builder
    {
        return $query->popular(now()->subMonths(), now())
            ->highestRated(now()->subMonths(6), now())
            ->minReviews(5);
    }

    public function scopeHighestRatedLastMonth(Builder $query): Builder
    {
        return $query->highestRated(now()->subMonth(), now())
            ->popular(now()->subMonth(), now())
            ->minReviews(2);
    }

    public function scopeHighestRatedLast6Months(Builder $query): Builder
    {
        return $query->highestRated(now()->subMonths(6), now())
            ->popular(now()->subMonths(6), now())
            ->minReviews(5);
    }
}
