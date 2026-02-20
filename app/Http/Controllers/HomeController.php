<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'settings' => $this->getSettings(),
            'projects' => PortfolioProject::active()->ordered()->get(),
            'services' => Service::ordered()->get(),
        ]);
    }

    private function getSettings(): array
    {
        $keys = [
            'site_name', 'hero_title', 'hero_subtitle', 'about_title', 'about_subtitle',
            'about_content', 'about_mission', 'about_values',
            'stat_projects', 'stat_projects_label', 'stat_years', 'stat_years_label',
            'stat_employees', 'stat_employees_label', 'stat_clients', 'stat_clients_label',
            'contact_address', 'contact_phone', 'contact_phone_full', 'contact_email', 'contact_hours',
            'whatsapp_number', 'footer_text', 'social_facebook', 'social_twitter',
            'social_instagram', 'social_linkedin', 'copyright',
        ];
        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key);
        }
        $settings['about_values'] = $settings['about_values']
            ? json_decode($settings['about_values'], true) ?? []
            : [];
        return $settings;
    }
}
