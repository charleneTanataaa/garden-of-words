<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function create()
    {
        if (!str_contains(url()->previous(), route('letter.create'))) {
            session(['letter_prev_url' => url()->previous()]);
        }
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

        $redirect = session('letter_prev_url', route('letter.show'));
        session()->forget('letter_prev_url');
        return redirect($redirect)->with('success', 'Letter saved!');
    }

    public function show(Request $request)
    {
        $query = Letter::where('user_id', Auth::id());

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $sortDirection = $request->input('sort', 'asc');
        $query->orderBy('created_at', $sortDirection);

        $letters = $query->get();
        $heading = 'My Letters';

        return view('letter.show', compact('letters', 'heading'));
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

    public function showAll(Request $request)
    {
        $query = Letter::query();

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $sortDirection = $request->input('sort', 'asc');
        $query->orderBy('created_at', $sortDirection);

        $letters = $query->get();
        $heading = 'Community Letters';

        return view('letter.show', compact('letters', 'heading'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $letters = Letter::where('title', 'LIKE', "%{$query}%")->get();

        $heading = session('last_heading', 'My Letters');

        return view('letter.show', compact('letters', 'heading'));
    }



}

