<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::first();
        $setting->update($request->all());

        if($request->hasFile('site_logo')){

            $destination = 'uploads/setting/'.$setting->site_logo;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('site_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/setting/', $filename);
            $setting->site_logo = $filename;
            $setting->save();
        }
        

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }
}