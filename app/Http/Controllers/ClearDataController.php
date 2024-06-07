<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ClearDataController extends Controller
{
    public function clearData()
    {
        // Execute the Artisan commands
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        // You can add more clearing commands if needed
        // Example: Artisan::call('clear-logs');
        echo 'Application data cleared successfully!';
        //return response()->json(['message' => 'Application data cleared successfully!']);
    }
}
