<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class Canvas
{
    /**
     * Return the installed version.
     *
     * @return string
     */
    public static function installedVersion(): string
    {
        if (app()->runningUnitTests()) {
            return '';
        }

        $dependencies = json_decode(
                            file_get_contents(base_path('composer.lock')),
                            true,
                            512,
                            JSON_THROW_ON_ERROR
                        )['packages'];

        return collect($dependencies)->firstWhere('name', 'austintoddj/canvas')['version'];
    }

    /**
     * Return a list of available language codes.
     *
     * @return array
     */
    public static function availableLanguageCodes(): array
    {
        $locales = preg_grep('/^([^.])/', scandir(dirname(__DIR__, 1).'/resources/lang'));
        $translations = collect();

        foreach ($locales as $locale) {
            $translations->push($locale);
        }

        return $translations->toArray();
    }

    /**
     * Return an encoded string of app translations.
     *
     * @param $locale
     * @return string
     */
    public static function availableTranslations($locale): string
    {
        return collect(trans('canvas::app', [], $locale))->toJson();
    }

    /**
     * Return an array of available user roles.
     *
     * @return array
     */
    public static function availableRoles(): array
    {
        return [
            User::CONTRIBUTOR => 'Contributor',
            User::EDITOR => 'Editor',
            User::ADMIN => 'Admin',
        ];
    }

    /**
     * Return true if the publishable assets are up to date.
     *
     * @return bool
     * @throws FileNotFoundException
     */
    public static function assetsUpToDate(): bool
    {
        if (app()->runningUnitTests()) {
            return true;
        }

        $path = public_path('vendor/canvas/mix-manifest.json');

        $message = sprintf('%s%s.  %s',
                           trans('canvas::app.assets_are_not_up_to_date'),
                           trans('canvas::app.to_update_run'),
                           'php artisan canvas:publish'
        );

        if (! File::exists($path)) {
            throw new RuntimeException($message);
        }

        return File::get($path) === File::get(__DIR__.'/../public/mix-manifest.json');
    }

    /**
     * Return the configured public path url, prioritizing a subdomain.
     *
     * @return string
     */
    public static function basePath(): string
    {
        return config('canvas.domain') ?? '/'.config('canvas.path');
    }

    /**
     * Return the configured storage path url.
     *
     * @return string
     */
    public static function baseStoragePath(): string
    {
        return sprintf('%s/%s', config('canvas.storage_path'), 'images');
    }

    /**
     * Check if a given URL is valid.
     *
     * @param string|null $url
     * @return bool
     */
    public static function isValid(?string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }

    /**
     * Trim a given URL and return the base.
     *
     * @param string|null $url
     * @return mixed
     */
    public static function trim(?string $url)
    {
        return parse_url($url)['host'] ?? null;
    }

    /**
     * Generate a Gravatar for a given email.
     *
     * @param string $email
     * @param int $size
     * @param string $default
     * @param string $rating
     * @return string
     */
    public static function gravatar(string $email, int $size = 200, string $default = 'retro', string $rating = 'g'): string
    {
        $hash = md5(trim(Str::lower($email)));

        return "https://secure.gravatar.com/avatar/{$hash}?s={$size}&d={$default}&r={$rating}";
    }

    public function viewer(Article $article)
    {
        if (! $this->wasRecentlyViewed($article)) {
            $referer = request()->header('referer');

            $data = [
                'article_id' => $article->id,
                'ip' => request()->getClientIp(),
                'agent' => request()->header('user_agent'),
                'referer' => self::isValid($referer) ? self::trim($referer) : false,
            ];

            $article->views()->create($data);

            $this->storeInSession($article);
        }
    }

    /**
     * Check if a given post exists in the session.
     *
     * @param Article $article
     * @return bool
     */
    protected function wasRecentlyViewed(Article $article): bool
    {
        $viewed = session()->get('viewed_posts', []);

        return array_key_exists($article->id, $viewed);
    }

    /**
     * Add a given post to the session.
     *
     * @param Article $article
     * @return void
     */
    protected function storeInSession(Article $article): void
    {
        session()->put("viewed_posts.{$article->id}", now()->timestamp);
    }
}
