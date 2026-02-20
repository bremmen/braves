<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('key')->get()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $groups = [
            'general' => ['site_name'],
            'hero' => ['hero_title', 'hero_subtitle'],
            'about' => ['about_title', 'about_subtitle', 'about_content', 'about_mission'],
            'stats' => ['stat_projects', 'stat_projects_label', 'stat_years', 'stat_years_label', 'stat_employees', 'stat_employees_label', 'stat_clients', 'stat_clients_label'],
            'contact' => ['contact_address', 'contact_phone', 'contact_phone_full', 'contact_email', 'contact_hours', 'whatsapp_number'],
            'footer' => ['footer_text', 'copyright', 'social_facebook', 'social_twitter', 'social_instagram', 'social_linkedin'],
        ];

        foreach ($groups as $keys) {
            foreach ($keys as $key) {
                if ($request->has($key)) {
                    $value = $request->input($key);
                    if (is_array($value)) {
                        $value = json_encode($value);
                    }
                    Setting::set($key, $value);
                }
            }
        }

        if ($request->has('about_values_raw')) {
            $lines = array_filter(array_map('trim', explode("\n", $request->input('about_values_raw'))));
            Setting::set('about_values', json_encode($lines));
        }

        return redirect()->route('admin.settings.index')->with('success', 'Configuración guardada correctamente.');
    }
}
