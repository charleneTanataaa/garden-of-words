<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class GardenController extends Controller
{
    public function index(){
        $user = Auth::user();
        $gardens = Garden::where('user_id', $user->id)
            ->with('flower')
            ->orderByDesc('date_grown')
            ->get();

        foreach($gardens as $garden)
        {
            $flower = $garden->flower;
            if($flower)
            {
                $flower->image = strtolower(str_replace(' ', '_', $flower->name)) . '.png';
            }
        }
        
        return view('garden', compact('gardens'));
    }

    public function calculateStreak($userId)
    {
        $dates = Garden::where('user_id', $userId)
        ->orderBy('updated_at', 'desc')
        ->pluck('updated_at')
        ->map(fn($d) => Carbon::parse($d)->startOfDay())
        ->unique();

        $today = Carbon::today();
        $streak = 0;

        foreach ($dates as $date) {
            if ($date->equalTo($today)) {
                $streak++;
                $today->subDay();
            } elseif ($date->equalTo($today->copy()->subDay())) {
                $streak++;
                $today->subDay();
            } else {
                break;
            }
        }

        return $streak;
    }
}
