<?php

namespace App\Services;

use Illuminate\Http\Request;

class LogoUploadService
{
    /**
     * @param Request $request
     * @param int $userId
     * @return bool
     */
    public static function Upload(Request $request, int $userId): bool
    {
        $user = \Auth::user();
        $fileName = time().'.'.$request->logo->extension();
        if ($user->avatar){
            \File::delete('upload/user_' . $userId . '/logo/' . $user->avatar);
        }
        $request->logo->move(public_path('upload/user_' . $userId . '/logo'), $fileName);
        $user->avatar = $fileName;
        $user->save();
        return true;
    }
}
