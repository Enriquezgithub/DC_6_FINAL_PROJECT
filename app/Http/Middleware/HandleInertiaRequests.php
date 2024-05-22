<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

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
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'user' => [
                'name' => auth()->user()->name ?? ''
            ],
            'permissions' => [
                'posts_view' => in_array(auth()->id(), [1, 2]),
                'posts_manage' => auth()->id() == 1
            ],
            'flash' => [
                'message' => session('create'),
            ],
            'success' => [
                'message' => session('success')
            ],
            'logout' => [
                'message' => session('logout')
            ],
            'edit' => [
                'message' => session('edit')
            ],
            'delete' => [
                'message' => session('delete')
            ]
        ];
    }
}
