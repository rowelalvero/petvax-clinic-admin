<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Artisan;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\BoarderDaycareAmount;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'settings.title';

        // module name
        $this->module_name = 'settings';

        // module icon
        $this->module_icon = 'fas fa-cogs';

        $this->global_booking = false;

        view()->share([
            'module_title' => $this->module_title,
            'module_name' => $this->module_name,
            'module_icon' => $this->module_icon,
            'global_booking' => $this->global_booking,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_action = 'List';

        return view('backend.settings.index', compact('module_action'));
    }

    public function index_data(Request $request)
    {
        if (!isset($request->fields)) {
            return response()->json($data ?? " ", 404);
        }

        $fields = explode(',', $request->fields);

        $data = Setting::whereIn('name', $fields)->get();

        $newData = [];

        foreach ($fields as $field) {
            $newData[$field] = setting($field);
            if (in_array($field, ['logo', 'mini_logo', 'mini_logo', 'dark_logo', 'dark_mini_logo', 'favicon'])) {
                $newData[$field] = asset(setting($field));
            }
        }

        $newData['quick_booking_url'] = route('app.quick-booking');

        return response()->json($newData, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->has('json_file')) {

            $file = $request->file('json_file');

            $fileName = $file->getClientOriginalName();
            $directoryPath = storage_path('app/data');

            if (!File::isDirectory($directoryPath)) {
                File::makeDirectory($directoryPath, 0777, true, true);
            }
            $files = File::files($directoryPath);

            foreach ($files as $existingFile) {
                $filePath = $existingFile->getPathname();

                if (strtolower($existingFile->getExtension()) === 'json') {
                    File::delete($filePath);
                }
            }
            $file->move($directoryPath, $fileName);
        }
        if (is_null($request->enable_multi_vendor)) {
            $petStoreRole = Role::where('name', 'pet_store')->first();

            $permissions = [
                'view_product', 'view_brand', 'view_unit',
                'view_tag', 'view_product_variation',
                'add_product', 'edit_product', 'delete_product', 'add_product_category', 'edit_product_category', 'delete_product_category',
                'add_product_subcategory', 'edit_product_subcategory', 'delete_product_subcategory',
                'add_unit', 'edit_unit', 'delete_unit',
                'add_tag', 'edit_tag', 'delete_tag',
                'add_brand', 'edit_brand', 'delete_brand',
                'add_product_variation', 'edit_product_variation', 'delete_product_variation',
                'add_supply', 'edit_supply', 'delete_supply',
                'add_logistics', 'edit_logistics', 'delete_logistics',
                'add_shipping_zones', 'edit_shipping_zones', 'delete_shipping_zones',
                'view_order', 'add_order', 'edit_order', 'delete_order', 'view_order_review'
            ];

            foreach ($permissions as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                if ($permission) {
                    $petStoreRole->revokePermissionTo($permission);
                }
            }
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('route:clear');
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('config:cache');
        }
        if ($request->enable_multi_vendor == 1) {
            $petStoreRole = Role::where('name', 'pet_store')->first();

            $permissions = [
                'view_product', 'view_brand', 'view_unit',
                'view_tag', 'view_product_variation',
                'add_product', 'edit_product', 'delete_product', 'add_product_category', 'edit_product_category', 'delete_product_category',
                'add_product_subcategory', 'edit_product_subcategory', 'delete_product_subcategory',
                'add_unit', 'edit_unit', 'delete_unit',
                'add_tag', 'edit_tag', 'delete_tag',
                'add_brand', 'edit_brand', 'delete_brand',
                'add_product_variation', 'edit_product_variation', 'delete_product_variation',
                'add_supply', 'edit_supply', 'delete_supply',
                'add_logistics', 'edit_logistics', 'delete_logistics',
                'add_shipping_zones', 'edit_shipping_zones', 'delete_shipping_zones',
                'view_order', 'add_order', 'edit_order', 'delete_order', 'view_order_review'
            ];

            foreach ($permissions as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                if ($permission) {
                    $petStoreRole->givePermissionTo($permission);
                }
            }
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('route:clear');
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('config:cache');
        }
        unset($data['json_file']);
        if ($request->wantsJson()) {
            $rules = Setting::getSelectedValidationRules(array_keys($data));
        } else {
            $rules = Setting::getValidationRules();
        }
        
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);
        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                $mimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/vnd.microsoft.icon'];
                if (gettype($val) == 'object') {
                    if ($val->getType() == 'file' && in_array($val->getmimeType(), $mimeTypes)) {
                        $setting = Setting::add($key, '', Setting::getDataType($key));
                        $mediaItems = $setting->addMedia($val)->toMediaCollection($key);
                        $setting->update(['val' => $mediaItems->getUrl()]);
                    }
                } else {
                    $setting = Setting::add($key, $val, Setting::getDataType($key));
                }
            }
        }
        if ($request->wantsJson()) {
            $message = __('settings.save_setting');

            return response()->json(['message' => $message, 'status' => true], 200);
        } else {
            return redirect()->back()->with('status', __('messages.setting_save'));
        }
    }

    public function clear_cache()
    {

        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('config:cache');

        $message = __('messages.cache_cleard');

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function reload_database()
    {

        \Illuminate\Support\Facades\Artisan::call('config:clear');

        \Illuminate\Support\Facades\Artisan::call('config:cache');
        set_time_limit(100);
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');

        $message = __('messages.reload_database');

        return response()->json(['message' => $message, 'status' => true], 200);
    }


    public function verify_email(Request $request)
    {
        $mailObject = $request->all();
        try {
            \Config::set('mail', $mailObject);
            Mail::raw('This is a smtp mail varification test mail!', function ($message) use ($mailObject) {
                $message->to($mailObject['email'])->subject('Test Email');
            });
            return response()->json(['message' => 'Verification Successful', 'status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Verification Failed', 'status' => false], 500);
        }
    }

    public function get_service_price(Request $request)
    {
        $data = null;
        if ($request->employee_id !== null) {
            $data = BoarderDaycareAmount::where('user_id', $request->employee_id)->first();

            if ($data !== null) {
                $data['val'] = $data->amount;
            } else {
                $data = Setting::where('name', $request->type)->first();

                if ($data !== null) {
                    $data['val'] =  (float)$data->val;
                } else {
                    $data = ['val' => 0]; // Handle the case when no settings are found
                }
            }
        } else {
            $data = ['val' => 0];
        }
        return response()->json(['data' => $data, 'status' => true]);
    }
}
