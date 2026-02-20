<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Braves - Construcción de Calidad'],
            ['key' => 'hero_title', 'value' => 'Construyendo Sueños, Creando Futuros'],
            ['key' => 'hero_subtitle', 'value' => 'Somos una empresa líder en construcción con más de 3 años de experiencia, comprometidos con la excelencia y la calidad en cada proyecto.'],
            ['key' => 'about_title', 'value' => 'Sobre Nosotros'],
            ['key' => 'about_subtitle', 'value' => 'Conoce nuestra historia y compromiso con la excelencia'],
            ['key' => 'about_content', 'value' => '<p><strong>Braves S.A.S</strong> es una empresa de profesionales altamente calificados en el sector de la construcción, conformado por arquitectos, ingenieros, albañiles, sanitarios, electricistas, pintores, herreros y otros especialistas.</p><p>Nos encargamos de todo el proceso del proyecto, desde la planificación hasta la entrega final, para que nuestros clientes no tengan que preocuparse por nada.</p><p>El hecho de poder gestionar la obra de principio a fin sin intermediarios nos permite trabajar con mayor eficiencia, rapidez y control sobre cada detalle.</p><p>Nuestro equipo trabaja en perfecta sintonía, manteniendo altos estándares de calidad, cumpliendo con los plazos establecidos y adaptándose a las necesidades específicas de cada cliente.</p>'],
            ['key' => 'about_mission', 'value' => 'Ser una empresa relevante y de excelencia para el mercado, reconocida por su ética, valores y calidad de nuestros productos. Ser una empresa en donde los colaboradores trabajen en un adecuado ambiente y clima laboral con claro crecimiento profesional, logrando así que se sientan orgullosos de pertenecer a nuestra organización, estando el control de calidad en el servicio. Una empresa diversificada e integrada, comprometida y admirada por su capacidad de crear valor y de innovar para dar respuesta a las nuevas necesidades sociales.'],
            ['key' => 'about_values', 'value' => json_encode([
                'Calidad y excelencia en cada proyecto',
                'Compromiso con la seguridad laboral',
                'Sostenibilidad y respeto al medio ambiente',
                'Transparencia y honestidad',
                'Innovación y tecnología de vanguardia',
            ])],
            ['key' => 'stat_projects', 'value' => '45+'],
            ['key' => 'stat_projects_label', 'value' => 'Proyectos Completados'],
            ['key' => 'stat_years', 'value' => '3'],
            ['key' => 'stat_years_label', 'value' => 'Años de Experiencia'],
            ['key' => 'stat_employees', 'value' => '11+'],
            ['key' => 'stat_employees_label', 'value' => 'Empleados Especializados'],
            ['key' => 'stat_clients', 'value' => '100%'],
            ['key' => 'stat_clients_label', 'value' => 'Clientes Satisfechos'],
            ['key' => 'contact_address', 'value' => 'Ciudad del Plata, San José'],
            ['key' => 'contact_phone', 'value' => '099 708 601'],
            ['key' => 'contact_phone_full', 'value' => '59899708601'],
            ['key' => 'contact_email', 'value' => 'francofontesst@gmail.com'],
            ['key' => 'contact_hours', 'value' => "Lunes - Viernes: 7:00 - 18:00\nSábados: 9:00 - 14:00"],
            ['key' => 'whatsapp_number', 'value' => '59899708601'],
            ['key' => 'footer_text', 'value' => 'Construyendo el futuro con calidad, seguridad y compromiso. Tu proyecto es nuestra pasión.'],
            ['key' => 'social_facebook', 'value' => '#'],
            ['key' => 'social_twitter', 'value' => '#'],
            ['key' => 'social_instagram', 'value' => '#'],
            ['key' => 'social_linkedin', 'value' => '#'],
            ['key' => 'copyright', 'value' => '© 2025 Braves SAS. Todos los derechos reservados.'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
