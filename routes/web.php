<?php

use App\Models\GymClass;
use App\Models\MembershipPlan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $plans = MembershipPlan::where('is_active', true)->get();
    $classes = GymClass::with('coach')->where('status', 'scheduled')->latest('scheduled_at')->take(4)->get();
    
    return view('welcome', compact('plans', 'classes'));
});
