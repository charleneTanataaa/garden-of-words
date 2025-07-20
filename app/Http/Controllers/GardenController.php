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
}
