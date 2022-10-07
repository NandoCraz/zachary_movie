<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Movie extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['cari'] ?? false,
            fn ($query, $cari) =>
            $query->where('judul', 'like', '%' . $cari . '%')
                ->orWhere('sinopsis', 'like', '%' . $cari . '%')
                ->orWhere('excerpt', 'like', '%' . $cari . '%')
        );

        $query->when(
            $filters['genre'] ?? false,
            fn ($query, $genre) =>
            $query->whereHas(
                'genre',
                fn ($query) =>
                $query->where('slug', $genre)
            )
        );

        $query->when(
            $filters['user'] ?? false,
            fn ($query, $user) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('username', $user)
            )
        );
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'genre_movies');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
