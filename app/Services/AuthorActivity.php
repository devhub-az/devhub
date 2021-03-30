<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

class AuthorActivity
{
    public static function activity(User $user): array
    {
        $count = [];
        $start_date = Carbon::now()->subDays(30)->format('Y-m-d');
        $current_date = Carbon::now()->format('Y-m-d');
        $period = CarbonPeriod::create($start_date, $current_date);

        foreach ($period->toArray() as $date) {
            $week_dates[] = Carbon::parse($date)->format('Y-m-d');
            $count[] = Article::select('created_at')->where('author_id', $user->id)
                ->whereDate('created_at', Carbon::parse($date))
                ->count();
        }

        return $count;
    }
}
