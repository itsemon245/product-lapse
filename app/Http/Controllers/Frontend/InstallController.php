<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    public function index()
    {
        return view('install.index');
    }

    public function store(InstallRequest $request)
    {
        setEnv([
            ...$request->validated(),
            'APP_INSTALLED' => 'true',
            'APP_DEBUG'=> 'false',
            'APP_URL'=> rtrim(url('/'), '/')
        ]);
        try {
            DB::getPdo();
            notify('Database configuration successful!');
        } catch (\Throwable $th) {
            //throw $th;
            notify()->error('Invalid database configuration!');

            return back();
        }

        return redirect(route('home'));
    }
}
