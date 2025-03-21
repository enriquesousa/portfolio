<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminLogTimesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\LogTime;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    use FileUpload;

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        flash()->success(__('Perfil actualizado correctamente.'));
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateAvatar(Request $request): RedirectResponse
    {

        // dd($request->all());

        $request->validate(
            [
                'avatar' => ['nullable', 'image', 'mimes:png,jpg', 'max:1024'],
            ],
            [
                // 'avatar.required' => __('The avatar is required.'),
                'avatar.image' => __('The avatar must be an image.'),
                'avatar.mimes' => __('The avatar must be a file of type: png, jpg.'),
                'avatar.max' => __('The avatar must not exceed 1MB.'),
            ]
        );

        $user = User::find(Auth::id());
        // dd($user->name);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $avatarPath = $this->uploadFile($request->file('avatar'));
            $this->deleteFile($user->avatar);

            $user->avatar = $avatarPath;
            $user->save();  
        }else{
            $this->deleteFile($user->avatar);
            $user->avatar = null;
            $user->save();
        }

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Avatar updated successfully');    
        flash()->success($message);

        return redirect()->route('profile.edit');
    }

    public function updateLanguage(Request $request): RedirectResponse
    {
        // dd($request->all());
        $locale = $request->language;

        $user = User::find(Auth::id());
        $user->language = $request->language;
        $user->save();

        Session::put('locale', $locale);
        app()->setLocale($locale);
        session(['lenguaje' => $locale]); // set session variable

        $message = __('Language updated successfully');    
        flash()->success($message);
        return redirect()->route('profile.edit');
    }

    public function actividades(AdminLogTimesDataTable $dataTable)
    {
        return $dataTable->render('admin.actividades.index');

        // $adminActividades = LogTime::all()->sortByDesc('id');
        // return view('admin.actividades.index', compact('adminActividades'));
    }

    public function logoutPage(): View
    {
        return view('admin.logout.index');
    }

}
