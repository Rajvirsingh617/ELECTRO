<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SystemInfo;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Retrieve system info
        $app_name = SystemInfo::where('meta_name', 'app_name')->first()->meta_value;
        $app_description = SystemInfo::where('meta_name', 'app_description')->first()->meta_value;
        $app_shortcut_icon_url = SystemInfo::where('meta_name', 'app_shortcut_icon_url')->first()->meta_value;
        $app_version = SystemInfo::where('meta_name', 'app_version')->first()->meta_value;
        $app_logo = SystemInfo::where('meta_name', 'app_logo')->first()->meta_value;
        
        // Customer Care
        $customer_care_no1 = SystemInfo::where('meta_name', 'customer_care_no1')->first()->meta_value;
        $customer_care_no2 = SystemInfo::where('meta_name', 'customer_care_no2')->first()->meta_value;
        
        // Store Contact Info
        $store_contact_info = SystemInfo::where('meta_name', 'store_contact_info')->first()->meta_value;
        
        // Social Media URLs
        $social_fb_url = SystemInfo::where('meta_name', 'social_fb_url')->first()->meta_value;
        $social_google_url = SystemInfo::where('meta_name', 'social_google_url')->first()->meta_value;
        $social_x_url = SystemInfo::where('meta_name', 'social_x_url')->first()->meta_value;
        $social_github_url = SystemInfo::where('meta_name', 'social_github_url')->first()->meta_value;
        
        // Support & email
        $support = SystemInfo::where('meta_name', 'support')->first()->meta_value;
        $email = SystemInfo::where('meta_name', 'email')->first()->meta_value;

        // Retrieve categories
        $categories = Category::whereNotNull('rank')->orderBy('rank', 'asc')->get();

        // Calculate the grand total for the authenticated user's cart
        $grandTotal = 0;

        if (Auth::check()) { // Check if user is authenticated
            $cartItems = DB::table('carts')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.customer_id', Auth::id()) 
                ->select('products.sell_price', 'carts.qty')
                ->get();

            // Calculate grand total
            foreach ($cartItems as $item) {
                $grandTotal += $item->sell_price * $item->qty;
            }
        }

        // Prepare data array
        $data = [
            'app_name' => $app_name,
            'app_description' => $app_description,
            'app_shortcut_icon_url' => $app_shortcut_icon_url,
            'app_version' => $app_version,
            'app_logo' => $app_logo,
            'customer_care_no1' => $customer_care_no1,
            'customer_care_no2' => $customer_care_no2,
            'store_contact_info' => $store_contact_info,
            'social_fb_url' => $social_fb_url,
            'social_google_url' => $social_google_url,
            'social_x_url' => $social_x_url,
            'social_github_url' => $social_github_url,
            'support' => $support,
            'email' => $email,
            'categories' => $categories
        ];

        // Share data with all views
        View::share('appData', $data);
        View::share('grandTotal', $grandTotal); // Share grandTotal with all views
    }
}
