<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\ContactUs;
use App\Model\State;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        view::composer('*', function($view) {
            $tableCheck = \Schema::hasTable('contact_us');
            $statesExists = \Schema::hasTable('states');

            if($tableCheck){
                $contact = ContactUs::where('id',1)->where('type',1)->first();
                if(!$contact)$contact = $this->contactData();
            }else{
                $contact = $this->contactData();
            }

            if ($statesExists) {
                $states = State::where('countryId', 2)->get();
            }

        // \View::composer('*', function($view) use ($contact){
            $view->with('contact', $contact);
            $view->with('states', $states);
        });

        if (config('app.debug')) {
            error_reporting(E_ALL & ~E_USER_DEPRECATED);
        } else {
            error_reporting(0);
        }
    }

    public function contactData()
    {
        $contact = (object)[];
            $contact->type = 1;
            $contact->name = "Headquarters";
            $contact->address = "5/13 Fielden Way, Port Kennedy,WA, 6172, Dummy location";
            $contact->phone = "[88] 657 524 332";
            $contact->email = "info@example.com";
            $contact->image = "/design/img/pic-1.png";
            $contact->facebook = "https://www.facebook.com";
            $contact->linkedin = "https://www.linkedin.com";
            $contact->youtube = "https://www.youtube.com";
        return $contact;
    }
}
