<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::find(1);
        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::find(1);
        return view('settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = request()->validate([
            'site_name' => ['required', 'min:3', 'max:50'],
            'cover_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10048'],
            'email' => ['required', 'email'],
            'social_instagram' => ['nullable', 'url'],
            'social_artstation' => ['nullable', 'url'],
            'social_twitter' => ['nullable', 'url'],
            'social_twitch' => ['nullable', 'url'],
            'social_youtube' => ['nullable', 'url'],
            'social_patreon' => ['nullable', 'url'],
        ]);
        $settings = Settings::find(1);
        $settings->update($validated);
        return redirect("settings/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
