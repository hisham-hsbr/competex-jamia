<?php

namespace Database\Seeders;

use App\Models\ApplicationSettings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ApplicationSettings::create([
        //     'name' => 'application',
        //     'data' => [
        //         'app_name' => 'HSBR',
        //         'app_version' => '1.1.0'
        //     ],
        //     'description' => 'app des', 'parent' => 'default', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        // ApplicationSettings::create([
        //     'name' => 'page',
        //     'data' => [
        //         'page_title_prefix' => 'HSBR',
        //         'page_title_suffix' => 'Online',
        //         'page_description' => 'default description',
        //         'page_message' => 'default message'
        //     ],
        //     'description' => 'app des', 'parent' => 'default', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        // ApplicationSettings::create([
        //     'name' => 'developer',
        //     'data' => [
        //         'name' => 'HSBR-apps',
        //         'website' => 'https://hsbr-apps.co',
        //         'mail' => 'hisham@hsbr-apps.co',
        //         'starting_year' => '2020',
        //         'ending_year' => '2023'
        //     ],
        //     'description' => 'app des', 'parent' => 'default', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        // ApplicationSettings::create([
        //     'name' => 'logo',
        //     'data' => [
        //         'sidebar_logo' => '1',
        //         'sidebar_mini_logo' => '1',
        //         'sign_logo' => '1',
        //         'sign_mini_logo' => '1',
        //         'sign_with_google' => '1',
        //         'sign_with_facebook' => '1'
        //     ],
        //     'description' => 'app des', 'parent' => 'default', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        // ApplicationSettings::create([
        //     'name' => 'default layout',
        //     'data' => [
        //         'card_header' => 1,
        //         'card_footer' => 1,
        //         'sidebar_collapse' => null,
        //         'dark_mode' => null,
        //     ],
        //     'description' => 'app des', 'parent' => 'layout', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        // ApplicationSettings::create([
        //     'name' => 'default action',
        //     'data' => [
        //         'default_status' => 1,
        //         'default_time_zone' => 1,
        //     ],
        //     'description' => 'app des', 'parent' => 'layout', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        // ApplicationSettings::create([
        //     'name' => 'default message',
        //     'data' => [
        //         'home_toolbar_message' => 'hai welcome to my app',
        //         'message' => 'test',
        //     ],
        //     'description' => 'app des', 'parent' => 'message', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
        ApplicationSettings::create([
            'name' => 'default front end layout',
            'data' => [
                'home_carousel_section' => 1,
                'about_section' => 1,
                'features_section' => 1,
                'call_to_action_section' => 1,
                'services_section' => 1,
                'portfolio_section' => 1,
                'testimonials_section' => 1,
                'pricing_section' => 1,
                'faq_section' => 1,
                'team_section' => 1,
                'contact_section' => 1,
            ],
            'description' => 'app des', 'parent' => 'message', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        ]);
        // ApplicationSettings::create([
        //     'name' => 'default front end blood bank layout',
        //     'data' => [
        //         'banner_section' => 1,
        //         'donation_process_section' => 1,
        //         'campaigns_section' => 1,
        //         'appointment_section' => 1,
        //         'cta_section' => 1,
        //         'gallery_section' => 1,
        //         'blog_section' => 1,
        //     ],
        //     'description' => 'app des', 'parent' => 'message', 'status' => '1', 'created_by' => '1', 'updated_by' => '1'
        // ]);
    }
}
