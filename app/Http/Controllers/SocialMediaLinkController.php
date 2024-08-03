<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class SocialMediaLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $mediaLinks = SocialMediaLink::all()->where('user_id', '=', $user->id);
        return view('socialMediaLinks.index', compact('mediaLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('socialMediaLinks.form', ['mediaLink' => new SocialMediaLink(), 'target' => '/social', 'method' => 'POST']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SocialMediaLink $socialMediaLink)
    {
        $user = auth()->user();
        $data = [
            'title' => $request->get('title'),
            'icon' => $request->get('icon'),
            'url' => $request->get('url'),
            'user_id' => $user->id,
        ];
        $socialMediaLink->fill($data);
        $socialMediaLink->save();
        return redirect('/social');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMediaLink $socialMediaLink)
    {
        // Don't need this really
        return redirect('/social');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMediaLink $socialMediaLink)
    {

        return view('socialMediaLinks.form', ['mediaLink' => $socialMediaLink, 'target' => '/social/'.$socialMediaLink->id, 'method' => 'PUT']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMediaLink $socialMediaLink)
    {
        $data = [
            'title' => $request->get('title'),
            'icon' => $request->get('icon'),
            'url' => $request->get('url'),
        ];
        $socialMediaLink->update($data);
        return redirect('/social');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMediaLink $socialMediaLink)
    {
        $socialMediaLink->delete();
        return redirect('/social');
    }
}
