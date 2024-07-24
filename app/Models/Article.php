<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'img', 'title', 'author_id', 'content', 'category_id'];
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'ilike', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );
    }
}
