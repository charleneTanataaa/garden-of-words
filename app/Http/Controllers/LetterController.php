<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function create()
    {
        return view('letter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:23',
            'content' => 'required|string',
            'color' => 'required|string',
        ]);

        Letter::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'color' => $request->color,
        ]);

        return redirect()->route('letter.create')->with('success', 'Letter saved!');
    }

    public function show()
    {
        $letters = Letter::all();

        return view('letter.show', compact('letters'));
    }

    public function edit(Letter $letter){
        return view('letter.create', compact('letter'));
    }

    public function update(Request $request, Letter $letter){
        $request->validate([
                'title' => 'required|string|max:23',
                'content' => 'required',
                'color' => 'required|string',
            ]);

        $letter->update($request->only('title', 'content', 'color'));

        return redirect()->route('letter.show')->with('success', 'Letter updated successfully!');    
    }

    public function destroy(Letter $letter){
        $letter->delete();
        return redirect()->route('letter.show')->with('success', 'Letter updated successfully!');    
    }
}

