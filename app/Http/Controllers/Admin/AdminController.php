<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    public function setting()
    {
        $data = Setting::first();
        return view('admin.setting.index',compact('data'));
    }


    public function updateSettings(Request $request)
    {

        try {
            if ($request->hasFile('photo')) {
                $imageName = time() . '.' . $request->photo->extension();
                // Public Folder
                $files = $request->photo->move('images', $imageName);
            }


            Setting::updateOrCreate([
                'id' => $request->id,
            ], [
                'name' => $request->name ?? null,
                'phone' => $request->phone ?? null,
                'email' => $request->email ?? null,
                'facebook' => $request->facebook ?? null,
                'twitter' => $request->twitter ?? null,
                'instagram' => $request->instagram ?? null,
                'whatsapp' => $request->whatsapp ?? null,
                'commission' => $request->commission ?? null,
                'notes' => $request->notes ?? null,
                'notes_1' => $request->notes_1 ?? null,
                'notes_2' => $request->notes_2 ?? null,
                'notes_3' => $request->notes_3 ?? null,
                'notes_4' => $request->notes_4 ?? null,
                'notes_5' => $request->notes_5 ?? null,
                'notes_6' => $request->notes_6 ?? null,
                'photo' => $files ?? null,
            ]);

            Session::flash('message', 'تم التعديل بنجاح');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }
}
