<?php

// app/Http/Middleware/ApiRateLimit.php

namespace App\Http\Middleware;

use App\Models\Query;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class ApiRateLimit
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $ip = $request->ip();
        $apiAddress = $request->path();

        $query = new Query([
            'api_address' => $apiAddress,
            'is_registered' => $user ? 1 : 0,
        ]);

        $query->save();

        $limitKey = $user ? 'user:' . $user->id : 'ip:' . $ip;
        $resetKey = $limitKey . '_reset';

        $requestCount = Cache::get($limitKey, 0);

        if ($requestCount >= ($user ? 50 : 10)) {
            return response()->json(['error' => 'Limit exceeded.'], 429);
        }

        if ($requestCount >= 49 && !$user) {
            // İstenirse kullanıcı kayıtlı değilse, son sınıra yaklaşıldığında önceki sorguları kontrol et
            $recentQueries = Query::apiAddress($apiAddress)->isRegistered(0)->latest()->take(10)->get();

            if ($recentQueries->count() >= 10) {
                return response()->json(['error' => 'Limit exceeded.'], 429);
            }
        }

        // Sorgu sayısını arttır
        Cache::put($limitKey, $requestCount + 1, now()->addDay());

        return $next($request);
    }
}
