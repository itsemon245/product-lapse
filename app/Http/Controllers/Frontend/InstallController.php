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
        setEnv($request->validated());
        Artisan::call('config:clear');
        try {
            DB::getPdo();
            notify('Database configuration successful!');
            setEnv([
                'APP_INSTALLED' => 'true',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            notify()->error('Invalid database configuration!');

            return back();
        }

        if ($request->fresh) {
            setEnv([
                'SEEDING' => 'true',
            ]);
            Artisan::call('migrate:fresh --seed');
            setEnv([
                'SEEDING' => 'false',
            ]);
        }

        return redirect(route('home'));
    }
}
