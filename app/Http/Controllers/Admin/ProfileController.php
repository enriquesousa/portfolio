<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminLogTimesDataTable;
use App\DataTables\AdminLogTimesDataTableAll;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\GeneralSetting;
use App\Models\LogTime;
use App\Models\TimeZone;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function languageEdit(Request $request): View
    {
        return view('admin.profile.language', [
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

            $avatarPath = $this->uploadFile($request->file('avatar'),'uploads','avatar');
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
        return redirect()->back();
    }

    public function timezoneSelect(): View
    {
        $timezones = TimeZone::all();
        return view('admin.timezone.set_time_zone', compact('timezones'));
    }
    
    public function timezoneUpdate(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'time_zone' => ['required', 'string'],
        ]);

        $generalSetting = GeneralSetting::first();
        $generalSetting->time_zone = $request->time_zone;
        $generalSetting->save();

        $message = __('Zona horaria actualizada correctamente!');    
        flash()->success($message);
        return redirect()->back();
    }

    public function actividades(AdminLogTimesDataTable $dataTable)
    {
        return $dataTable->render('admin.actividades.index');

        // $adminActividades = LogTime::all()->sortByDesc('id');
        // return view('admin.actividades.index', compact('adminActividades'));
    }

    public function actividadesAll(AdminLogTimesDataTableAll $dataTable)
    {
        return $dataTable->render('admin.actividades.index');

        // $adminActividades = LogTime::all()->sortByDesc('id');
        // return view('admin.actividades.index', compact('adminActividades'));
    }

    public function logoutPage(): View
    {
        return view('admin.logout.index');
    }

    public function getLogTimeDetails(string $id): Response 
    {

        $logTime = LogTime::with('user')->findOrFail($id);

        $login_time = formatFecha5($logTime->login_time);
        if(empty($logTime->logout_time)) {
            $logout_time = '-';
        }else {
            $logout_time = formatFecha5($logTime->logout_time);
        }
        $time_interval = intervaloTiempo($logTime->login_time, $logTime->logout_time);
        $created_at = formatFecha6($logTime->created_at);
        $description = $logTime->description;

        return response(['logTime' => $logTime, 'login_time' => $login_time, 'logout_time' => $logout_time ,'time_interval' => $time_interval, 'created_at' => $created_at, 'description' => $description], 200);
    }

    public function getModalImagePreview(string $image, string $width, string $height)
    {
        // dd($image, $width, $height);
        return response(['image' => $image, 'width' => $width, 'height' => $height], 200);
    }

    public function registerActivityView(Request $request)
    {
        return view('admin.actividades.create');
    }

    public function registerActivityStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'description' => ['nullable'],
        ]);

        $user = User::find(Auth::id());
        // dd($user->id);

        // Encontrar la ultima sesión del usuario en tabla log_times
        $logTime = LogTime::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        $lastLogTime = $logTime->logout_time;
        // dd($lastLogTime);

        if(!empty($lastLogTime)) {
            // Crear una nueva actividad
            LogTime::create([
                'user_id' => $user->id,
                'login_time' => $lastLogTime,
                'logout_time' => now(),
                'description' => $request->description
            ]);
        }else {
            $logTime->logout_time = now();
            $logTime->description = $request->description;
            $logTime->save();    
        }

        flash()->success(__('Actividad registrada correctamente!'));
        return redirect()->route('profile.actividades.index');
    }
    
}
