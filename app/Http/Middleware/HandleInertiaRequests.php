<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $current_user = User::where('id', $request->id)->first();
        $isAuthorized = false;

        if($current_user != null) {
            if (Gate::allows('show-edit', $current_user)) {
                $isAuthorized = true;
            }
        }
        
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'authorization' => [
                'edit_profile_authorization' => $isAuthorized
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
        ];
    }
}
