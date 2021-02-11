<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Ramsey\Uuid\UuidInterface;

trait HasSlug
{
    public function slug(): string
    {
        return $this->slug;
    }

    public function setSlugAttribute(string $slug)
    {
        $this->attributes['slug'] = $this->generateUniqueSlug($slug);
    }

    public static function showBySlugApi(string $slug): self
    {
        return static::withcount(
            [
                'views',
                'comments',
            ]
        )->where('slug', $slug)->firstOrFail();
    }

    public static function findBySlug(string $slug): self
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    public static function showBySlug(string $slug): self
    {
        return static::with(
            [
                'creator' => function ($query) {
                    $query->select('id', 'name', 'username', 'avatar', 'description', 'karma', 'rating', 'github_url')
                        ->withCount(
                            'articles',
                            'followers'
                        );
                },
            ]
        )->where('slug', $slug)->firstOrFail();
    }

    private function generateUniqueSlug(string $value): string
    {
        return Str::slug($value);
    }

    private function slugExists(string $slug, UuidInterface $ignoreId = null): bool
    {
        $query = $this->where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->count();
    }
}
