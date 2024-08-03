<?php

namespace App\Http\Controllers;

use App\Models\User;

abstract class Controller
{
    // Author (user) directory
    public function authors() {
        $authors = User::all();
        return view('contentPage.authors', compact('authors'));
    }

    // Will attempt to match a user to author by name in "author-name" format, return to the home screen otherwise
    public function authorPages($author)
    {
        $response = view('/');
        $authors = User::all();

        $matchedAuthor = $authors->filter(function ($user) use ($author) {
            $formattedUsername = strtolower(str_replace(' ', '-', $user->name));
            $formattedAuthor =strtolower(str_replace(' ', '-', $author));
            return Str::contains($formattedUsername, $formattedAuthor);
        });

        if (count($matchedAuthor)) {
            $response = view('contentPage.author', ['author' => $matchedAuthor]);
        }

        return $response;
    }
}
