<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Traits\RepoResponse;

class WebSetting extends Model
{
    use RepoResponse;

    protected $table = "web_settings";

    protected $fillable = [
        'site_name',
        'address',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'terms_service',
        'privacy_policy',
        'application_logo',
        'favicon',
        'og_logo',
        'created_at',
        'updated_at',
    ];

    public function settingUpdae($request)
    {
        DB::beginTransaction();

            try {

                $sitesetting = WebSetting::first();

                $site_logo = $request->file('application_logo');

                if ($site_logo) {
                    $name = time() . '.' . $site_logo->getClientOriginalExtension();
                    $path = 'uploads/logo/';
                    $site_logo->move($path, $name);

                    if(file_exists($sitesetting->application_logo)) {
                        unlink($sitesetting->application_logo);
                    }

                    $applicationlogo = $path . $name;
                } else {
                    $applicationlogo = $sitesetting->application_logo;
                }

                $site_favicon = $request->file('favicon');
                if ($site_favicon) {
                    $name = time() . '.' . $site_favicon->getClientOriginalExtension();
                    $path = 'uploads/favicon/';
                    $site_favicon->move($path, $name);

                    if(file_exists($sitesetting->favicon)) {
                        unlink($sitesetting->favicon);
                    }


                    $favicon = $path . $name;
                } else {
                    $favicon = $sitesetting->favicon;
                }

                $site_og_logo = $request->file('og_logo');
                if ($site_og_logo) {
                    $name = time() . '.' . $site_og_logo->getClientOriginalExtension();
                    $path = 'uploads/og_logo/';
                    $site_og_logo->move($path, $name);

                    if(file_exists($sitesetting->og_logo)) {
                        unlink($sitesetting->og_logo);
                    }

                    $oglogo = $path . $name;
                } else {
                    $oglogo = $sitesetting->og_logo;
                }

                WebSetting::findOrFail(1)->update([
                    "site_name" => $request->site_name,
                    "address" => $request->address,
                    "meta_title" => $request->meta_title,
                    "meta_keyword" => $request->meta_keyword,
                    "meta_description" => $request->meta_description,
                    "terms_service" => $request->terms_service,
                    "privacy_policy" => $request->privacy_policy,
                    'application_logo' => $applicationlogo,
                    'favicon' => $favicon,
                    'og_logo' => $oglogo,
                ]);

            } catch (\Throwable $th) {
                // dd($th);
                DB::rollBack();
                return $this->formatResponse(false, 'Unable to update websettings', 'admin.web.setting');
            }

        DB::commit();

        return $this->formatResponse(true, 'Web settings updated successfully done', 'admin.web.setting');
    }
}
