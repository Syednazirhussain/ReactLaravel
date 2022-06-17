<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('settings')->insert([
            'id'=>1,
            'site_name' => 'Nakiska Shaikh',
            'site_desc' => 'Creative Director & UX Lead :: Hybrid Events, Immersive Digital Experiences, Metascapes, Interface Design, Experience Architecture',
            'cursor_circle_text' => 'Play Reel',
            'cursor_border_size' => '1',
            'cursor_color' => '#ff0000',
            'background_color' => '#000000',
            'headings_font_family' => 'Dela Gothic One',
            'headings_weight' => '400',
            'headings_size' => '70px',
            'headings_color' => '#6d4a4a',
            'headings_desktop_align' => 'center',
            'body_font_family' => 'Benguiat',
            'body_weight' => '600',
            'body_size' => '36px',
            'body_color' => '#833f3f',
            'body_desktop_align' => 'center',
            'links_font_family' => 'Pacifico',
            'links_size' => '24px',
            'links_desktop_align' => 'center',
            'links_color' => '#b71515',
            'links_weight' => '300',
            'site_logo_inactive_svg' => '<svg width="22px" height="19px" viewBox="0 0 22 19"><g transform="translate(-76.000000, -80.000000)" fill="#FFFFFF"><path d="M85.6483711,98.208 L85.6483711,97.7148493 C83.6107726,97.4496254 83.4909139,96.4667369 83.4838633,94.4725101 L83.4834227,89.7187632 C83.4834227,87.9222857 83.6638351,86.8655342 84.5298144,85.4565323 C85.3236289,84.2236556 87.0195052,83.2021292 88.4988866,83.2021292 C89.3287835,83.2021292 90.1225979,83.6952798 90.5195052,84.4350059 C90.6946113,84.7768961 90.8697174,85.2183366 90.8798663,86.9832116 L90.8798701,94.4743812 C90.872666,96.4380681 90.7525979,97.4499569 88.7514639,97.7148493 L88.7514639,98.208 L97.736,98.208 L97.736,97.7148493 C95.6644415,97.4827784 95.5425851,96.4394344 95.5354171,94.4673479 L95.5349691,85.9144579 C95.5349691,83.429044 95.1741248,82.6089043 94.7652188,82.0494291 L94.7050722,81.9692524 L94.7050722,81.9692524 C93.8030103,80.7363757 92.6483711,80.208 90.8803299,80.208 C88.5349691,80.208 86.1535258,81.3704266 83.4834227,84.1532055 C83.3030103,82.1101526 83.1225979,81.617002 82.5813608,80.5250254 L76.736,80.9829511 L76.736,81.4761018 C78.7396386,81.7744786 78.8574997,82.7281146 78.8644327,84.7187851 L78.8644061,94.4743812 C78.8572021,96.4380681 78.737134,97.4499569 76.736,97.7148493 L76.736,98.208 L85.6483711,98.208 Z" id="n"></path></g></svg>',
            'site_logo_svg' => '<svg width="22px" height="19px" viewBox="0 0 22 19"><g transform="translate(-76.000000, -80.000000)" fill="#FF4B36"><path d="M85.6483711,98.208 L85.6483711,97.7148493 C83.6107726,97.4496254 83.4909139,96.4667369 83.4838633,94.4725101 L83.4834227,89.7187632 C83.4834227,87.9222857 83.6638351,86.8655342 84.5298144,85.4565323 C85.3236289,84.2236556 87.0195052,83.2021292 88.4988866,83.2021292 C89.3287835,83.2021292 90.1225979,83.6952798 90.5195052,84.4350059 C90.6946113,84.7768961 90.8697174,85.2183366 90.8798663,86.9832116 L90.8798701,94.4743812 C90.872666,96.4380681 90.7525979,97.4499569 88.7514639,97.7148493 L88.7514639,98.208 L97.736,98.208 L97.736,97.7148493 C95.6644415,97.4827784 95.5425851,96.4394344 95.5354171,94.4673479 L95.5349691,85.9144579 C95.5349691,83.429044 95.1741248,82.6089043 94.7652188,82.0494291 L94.7050722,81.9692524 L94.7050722,81.9692524 C93.8030103,80.7363757 92.6483711,80.208 90.8803299,80.208 C88.5349691,80.208 86.1535258,81.3704266 83.4834227,84.1532055 C83.3030103,82.1101526 83.1225979,81.617002 82.5813608,80.5250254 L76.736,80.9829511 L76.736,81.4761018 C78.7396386,81.7744786 78.8574997,82.7281146 78.8644327,84.7187851 L78.8644061,94.4743812 C78.8572021,96.4380681 78.737134,97.4499569 76.736,97.7148493 L76.736,98.208 L85.6483711,98.208 Z" id="n"></path></g></svg>',
            'cursor_blend_mode' => 1,
            'site_logo_url' => null,
            'background_image_url' => 'setting/1/0B5Cx2Q4l6PKT87LYZZszFSsUSWEDw2kWibt0fpl.png',
            'site_logo_inactive_url' => null,
            'cursor_icon_url' => 'setting/1/tSQLlxSE3eWaQ8N9qm4Nskdw5iVG8YIPrBr18B7A.png',
            'intro_shape_url_1' => 'setting/1/tMHYZhyDz6FA4YTrSg1FpylyQscBWG9IbjLBTrxB.svg',
            'intro_shape_url_2' => 'setting/1/NgdmZJz7INEonwhH1sIemKNLm2H0YnYP91IAJAf4.png',
            'favicon_url' => 'setting/1/ud77SlGCrY4aMlGcuYWO0DfsZdfJDFzX8V1FZhlX.png',
            'video_url_1' => 'setting/1/JmfXzhzmUnZFGRQg0f6scPY2nkUWSiqO9OwKvvgI.png',
            'headings_font_family_id' => 3,
            'body_font_family_id' => 6,
            'links_font_family_id' => 2,
            'hover_border_color' => '#6e0c0c',
            'hover_border_size' => '433',
            'hover_border_color_mobile' => '#711919',
            'hover_border_mobile_size' => '43',
            'headings_weight_mobile' => '900',
            'headings_color_mobile' => '#6a1616',
            'headings_size_mobile' => '4',
            'headings_desktop_align_mobile' => 'left',
            'body_weight_mobile' => '900',
            'body_color_mobile' => '#ff0000',
            'body_size_mobile' => '34',
            'body_desktop_align_mobile' => 'center',
            'links_color_mobile' => '#ff0000',
            'links_weight_mobile' => '300',
            'links_size_mobile' => '4',
            'links_desktop_align_mobile' => 'left',
            'headings_font_family_mobile_id' => 6,
            'body_font_family_mobile_id' => 3,
            'links_font_family_mobile_id' => 2,
            'headings_font_family_mobile' => 'Benguiat',
            'body_font_family_mobile' => 'Dela Gothic One',
            'links_font_family_mobile' => 'Pacifico',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
