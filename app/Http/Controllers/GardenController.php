<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GardenController extends Controller
{
    public function index(){
        $user = Auth::user();
        $garden = Garden::where('user_id', $user->id)->latest()->first();

        if(!$garden){
            return view('garden', ['garden' => null]);
        }

        $flower = $garden->flower;
        $flower->image = strtolower(str_replace(' ', '_', $flower->name)) . '.png';
        $startDate = $garden->date_grown;
        $finishDate = \Carbon\Carbon::parse($startDate)->addDays(7);

        return view('garden', compact('garden', 'flower', 'startDate', 'finishDate'));
    }
}
