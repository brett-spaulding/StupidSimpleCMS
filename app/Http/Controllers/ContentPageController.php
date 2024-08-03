<?php

namespace App\Http\Controllers;

use Mauricius\LaravelHtmx\Http\HtmxResponseClientRedirect;
use App\Models\ContentPage;
use Illuminate\Http\Request;
use Parsedown;

class ContentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $contentPages = ContentPage::all()->where('user_id', '=', $user->id);
        return view('contentPage.index', compact('contentPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contentPage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ContentPage $contentPage)
    {
        $user = auth()->user();
        $contentPage->user_id = $user->id;
        $contentPage->name = $request->input('name');
        $contentPage->title = $request->input('title');
        $contentPage->slug = str_replace('/', '', $request->input('slug'));
        $contentPage->content = $request->input('content');
        $contentPage->save();
        return redirect('/content/' . $contentPage->id . '/edit');
    }

    /**
     * Display the specified resource.  Modified to aggregate by slug so URL's are pretty for SEO
     */
    public function show($slug)
    {
        $Parsedown = new Parsedown();
        $page = ContentPage::all()->where('slug', '=', $slug)->first();
        if ($page && $page->published) {
            $pageContent = $Parsedown->text($page->content);
            return view('contentPage.show', ['contentPage' => $page, 'pageContent' => $pageContent]);
        } else {
            return redirect('/');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contentPage = ContentPage::all()->where('id', '=', $id)->first();
        return view('contentPage.edit', ['contentPage' => $contentPage]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request;
        unset($data['_token']);
        unset($data['_method']);
        $contentPage = ContentPage::all()->where('id', '=', $id)->first();
        $contentPage->update($data->all());
        return redirect('/content/' . $contentPage->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contentPage = ContentPage::find($id);
        if ($contentPage->exists()) {
            $contentPage->delete();
        }
        return new HtmxResponseClientRedirect('/content');
    }

    public function togglePublish(Request $request, $id)
    {
        $contentPage = ContentPage::find($id);
        if ($contentPage->exists()){
            $contentPage->published = !$contentPage->published;
            $contentPage->save();
        }
        return new HtmxResponseClientRedirect('/content');
    }
}
