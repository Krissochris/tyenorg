<?php


namespace GriffonTech\Admin\Http\Controllers;



use Illuminate\Http\Request;

class SiteSettingsController
{

    public function index()
    {
        return view('admin::site_settings.index');
    }

    public function store(Request $request)
    {
        $requestData = $request->except(['_token']);
        foreach( $requestData as $key => $value) {
            if (!empty($value)) {
                setting([$key => $value]);
            }
        }
        setting()->save();
        session()->flash('success', 'Settings has been updated!');
        return back();
    }
}
