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
    /**
     * @param FilterRequest $request
     * @return HubsResource
     */
    public function index(FilterRequest $request): HubsResource
    {
        return new HubsResource(
            Hub::withCount(['articles', 'favorites'])
                ->orderBy($request->get('column'), $request->get('order'))
                ->paginate($request->perPage)
        );
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Hub::select(['id', 'name', 'logo'])->orderBy('name')->get();
    }

    /**
     * @param $id
     *
     * @return HubResource
     */
    public function show($id): HubResource
    {
        HubResource::withoutWrapping();

        return new HubResource(Hub::findorfail($id));
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function follow(Request $request): JsonResponse
    {
        Hub::flushQueryCache();
        $user = auth()->guard('api')->user();
        $hub = Hub::findOrFail($request->get('id'));
        if (isset($hub) && ! $hub->isFavoritedBy($user)) {
            $user->favorite($hub);

            return response()->json(['success' => 'success']);
        }
        if ($hub->isFavoritedBy($user)) {
            $user->unfavorite($hub);

            return response()->json(['delete' => 'delete']);
        }

        return response()->json(['error' => 'error'], 401);
    }

    /**
     * @return HubsResource
     */
    public function search_hub_by_key(): HubsResource
    {
        $key = \Request::get('q');
        $hub = Hub::where('name', 'LIKE', "%{$key}%")->withCount(['articles', 'favorites'])->paginate();

        return new HubsResource($hub);
    }
}
