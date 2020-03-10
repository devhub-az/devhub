<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     * @param Request $request
     * @return Request
     */
    public function saveFiles(Request $request): Request
    {
        if (! file_exists(public_path('uploads'))) {
            if (!mkdir($concurrentDirectory = public_path('uploads'), 0777) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            if (!mkdir($concurrentDirectory = public_path('uploads/thumb'), 0777) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
        }

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file);
                    if (!file_exists(public_path('uploads/thumb')) && !mkdir($concurrentDirectory = public_path('uploads/thumb'),
                            0777,
                            true) && !is_dir($concurrentDirectory)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created',
                            $concurrentDirectory));
                    }
                    Image::make($file)->resize(50, 50)->save(public_path('uploads/thumb') . '/' . $filename);
                    $width  = $image->width();
                    $height = $image->height();
                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_width'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $image->save(public_path('uploads') . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move(public_path('uploads'), $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                }
            }
        }

        return $finalRequest;
    }
}
