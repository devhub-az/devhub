<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'article_id',
        'clicks',
    ];

    /**
     * Get the article for visitor.
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public static function log($articleId, $ip)
    {
        $log = self::query()->where('article_id', $articleId)->where('ip', $ip)->first();
        if ($log) {
            $log->increment('clicks');
        } else {
            $data = [
                'ip'         => $ip,
                'article_id' => $articleId,
                'clicks'     => 1,
            ];
            $log = self::create($data);
        }

        return $log;
    }
}
