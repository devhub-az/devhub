<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\HubResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HubController extends Controller
{
    public function index(FilterRequest $request): HubsResource
    {
        return new HubsResource(
            Hub::withCount(['articles', 'followers'])
                ->orderBy($request->get('column'), $request->get('order'))
                ->paginate($request->perPage)
        );
    }

    public function all(): Collection
    {
        return Hub::select(['id', 'name', 'logo'])->orderBy('name')->get();
    }

    public function show($slug): HubResource
    {
        HubResource::withoutWrapping();

        return new HubResource(Hub::where('slug', $slug)->firstOrFail());
    }

    public function topRated(): HubsResource
    {
        return new HubsResource(
            Hub::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get()
        );
    }

    public function topFollowed(): HubsResource
    {
        return new HubsResource(
            Hub::withCount('followers')->orderBy('followers_count', 'desc')->take(5)->get()
        );
    }

    public function follow(int $id): JsonResponse
    {
        $user = auth('sanctum')->user();
        $hub = Hub::findOrFail($id);

        try {
            $user->toggleFollow($hub);

            return response()->json('success');
        } catch (Exception $exception) {
            return response()->json($exception);
        }
    }

    public function search_hub_by_key(Request $request): HubsResource
    {
        return new HubsResource(Hub::where('name', 'LIKE', "%{$request->get('q')}%")->withCount(['articles'])->paginate());
    }
}
