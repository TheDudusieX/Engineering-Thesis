<?php

namespace App\Http\Controllers;

use App\Models\Orchestra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index() {
        $profile = Auth::user();
        $orchestra = Orchestra::where('agent_id', $profile->id)->first();
        if(Orchestra::where('agent_id', $profile->id)->exists())
        return view('profile', compact('profile','orchestra'));
        else
        return view('profileJury', compact('profile'));
    }

    public function update(ProfileUpdateRequest $request) {
        $user = Auth::user();
        $orchestra = Orchestra::where('agent_id', $user->id)->first();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $orchestra->orchestraname = $request->input('orchestraname');
        $orchestra->numberofmembers = $request->input('numberofmembers');
        $orchestra->bandmaster = $request->input('bandmaster');
        $orchestra->president = $request->input('president');
        $orchestra->description = $request->input('description');
        $user->save();
        $orchestra->save();
        return redirect()->route('profile')
        ->with('success', __('translation.toast.success'));
    }

    public function updateJury(Request $request) {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect()->route('profileJury')
        ->with('success', __('translation.toast.success'));
    }
    public function changepassword(Request $request) {
        $user = Auth::user();
        $request->validate([
            'password' => ['required',Password::min(8)],
            'newpassword' => ['required',Password::min(8),'confirmed'],
        ]);
        if(Hash::check($request->input('password'), $user->password)) {
            $user->password = Hash::make($request->input('newpassword'));
            $user->save();
            return redirect()->route('profile')
            ->with('success', __('translation.toast.successpassword'));
        }
        else {
            return redirect()->route('profile')
            ->with('danger', __('translation.toast.dangerpassword'));
        }
    }
}
