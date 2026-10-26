<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return view('admin.profile', ['profile' => $request->user()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'min:2', 'max:120']]);
        $request->user()->update(['name' => trim($data['name'])]);
        return redirect()->route('dashboard.profile', ['locale' => app()->getLocale()])->with('status', 'Profile updated successfully.');
    }
}
