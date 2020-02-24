<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

$s = 'public.';
Route::get('/',         ['as' => $s . 'home',   'uses' => 'PagesController@getHome']);
Route::post('/added', ['as' => $s . 'added', 'uses' => 'PagesController@added']);
Route::get('/list-your-venue',         ['as' => $s . 'list_your_venue',   'uses' => 'ListYourVenueController@getHome']);
Route::post('/list-your-venue/added', ['as' => $s . 'added', 'uses' => 'ListYourVenueController@added']);
Route::get('/contact-us',         ['as' => $s . 'contact_us',   'uses' => 'ContactUsController@getHome']);
Route::post('/contact-us/added', ['as' => $s . 'added', 'uses' => 'ContactUsController@added']);
Route::get('/blog/',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@index']);
Route::get('/blog/{category}',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@index']);
Route::get('/blog/{category}/{slug}',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@getblog']);

//Route::get('/blog/',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@getdetails']);

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function()
{
    $a = 'admin.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'AdminController@index']);	
	//Route::get('/users', ['as' => $a . 'users', 'uses' => 'AdminController@users']);
	//Route::get('/get_users', ['as' => $a . 'get_users', 'uses' => 'AdminController@getUsers']);
	
	//Route::get('/roles', ['as' => $a . 'users', 'uses' => 'AdminController@roles']);
	
	//Admin Multilanguage Root
	Route::get('/multilanguage', ['as' => $a . 'multilanguage', 'uses' => 'MultiLanguageController@index']);
	Route::post('multilanguage/added', ['as' => $a . 'added', 'uses' => 'MultiLanguageController@added']);
	Route::post('multilanguage/updated', ['as' => $a . 'updated', 'uses' => 'MultiLanguageController@updated']);
	Route::post('multilanguage/deleted', ['as' => $a . 'deleted', 'uses' => 'MultiLanguageController@deleted']);
	Route::post('multilanguage/destroy', ['as' => $a . 'destroy', 'uses' => 'MultiLanguageController@destroy']);	
	Route::post('multilanguage/getmultilanguage', ['as' => $a . 'getmultilanguage', 'uses' => 'MultiLanguageController@getmultilanguage']);
	
	
	//Admin Country Root
	Route::get('/country', ['as' => $a . 'country', 'uses' => 'CountryController@index']);
	Route::post('country/added', ['as' => $a . 'added', 'uses' => 'CountryController@added']);
	Route::post('country/updated', ['as' => $a . 'updated', 'uses' => 'CountryController@updated']);
	Route::post('country/deleted', ['as' => $a . 'deleted', 'uses' => 'CountryController@deleted']);
	Route::post('country/destroy', ['as' => $a . 'destroy', 'uses' => 'CountryController@destroy']);	
	Route::post('country/getcountry', ['as' => $a . 'getcountry', 'uses' => 'CountryController@getcountry']);
	Route::post('country/enable', ['as' => $a . 'enable', 'uses' => 'CountryController@enable']);
	Route::post('country/disable', ['as' => $a . 'deleted', 'uses' => 'CountryController@disable']);

	
	
	//Admin currency Root
	Route::get('/currency', ['as' => $a . 'currency', 'uses' => 'CurrencyController@index']);
	Route::post('currency/added', ['as' => $a . 'added', 'uses' => 'CurrencyController@added']);
	Route::post('currency/updated', ['as' => $a . 'updated', 'uses' => 'CurrencyController@updated']);
	Route::post('currency/deleted', ['as' => $a . 'deleted', 'uses' => 'CurrencyController@deleted']);
	Route::post('currency/destroy', ['as' => $a . 'destroy', 'uses' => 'CurrencyController@destroy']);	
	Route::post('currency/getcurrency', ['as' => $a . 'getcurrency', 'uses' => 'CurrencyController@getcurrency']);
	
	//Admin Subscription Plan Root
	
	Route::get('subscription/plan', ['as' => $a . 'plan', 'uses' => 'SubscriptionPlanController@index']);
	Route::post('subscription/plan/added', ['as' => $a . 'added', 'uses' => 'SubscriptionPlanController@added']);
	Route::post('subscription/plan/updated', ['as' => $a . 'updated', 'uses' => 'SubscriptionPlanController@updated']);
	Route::post('subscription/plan/deleted', ['as' => $a . 'deleted', 'uses' => 'SubscriptionPlanController@deleted']);
	Route::post('subscription/plan/destroy', ['as' => $a . 'destroy', 'uses' => 'SubscriptionPlanController@destroy']);	
	Route::post('subscription/plan/getplan', ['as' => $a . 'getplan', 'uses' => 'SubscriptionPlanController@getplan']);
	
	//Admin Subscription Duration Root
	
	Route::get('subscription/duration', ['as' => $a . 'duration', 'uses' => 'SubscriptionDurationController@index']);
	Route::post('subscription/duration/added', ['as' => $a . 'added', 'uses' => 'SubscriptionDurationController@added']);
	Route::post('subscription/duration/updated', ['as' => $a . 'updated', 'uses' => 'SubscriptionDurationController@updated']);
	Route::post('subscription/duration/deleted', ['as' => $a . 'deleted', 'uses' => 'SubscriptionDurationController@deleted']);
	Route::post('subscription/duration/destroy', ['as' => $a . 'destroy', 'uses' => 'SubscriptionDurationController@destroy']);	
	Route::post('subscription/duration/getduration', ['as' => $a . 'getduration', 'uses' => 'SubscriptionDurationController@getduration']);
	
	//Admin Subscription Features Root
	
	Route::get('subscription/features', ['as' => $a . 'features', 'uses' => 'SubscriptionFeaturesController@index']);
	Route::post('subscription/features/added', ['as' => $a . 'added', 'uses' => 'SubscriptionFeaturesController@added']);
	Route::post('subscription/features/updated', ['as' => $a . 'updated', 'uses' => 'SubscriptionFeaturesController@updated']);
	Route::post('subscription/features/deleted', ['as' => $a . 'deleted', 'uses' => 'SubscriptionFeaturesController@deleted']);
	Route::post('subscription/features/destroy', ['as' => $a . 'destroy', 'uses' => 'SubscriptionFeaturesController@destroy']);	
	Route::post('subscription/features/getfeatures', ['as' => $a . 'getfeatures', 'uses' => 'SubscriptionFeaturesController@getfeatures']);
	
	//Admin Subscription Pricing Root
	
	Route::get('subscription/pricing', ['as' => $a . 'pricing', 'uses' => 'SubscriptionPricingController@index']);
	Route::post('subscription/pricing/added', ['as' => $a . 'added', 'uses' => 'SubscriptionPricingController@added']);
	Route::post('subscription/pricing/updated', ['as' => $a . 'updated', 'uses' => 'SubscriptionPricingController@updated']);
	Route::post('subscription/pricing/deleted', ['as' => $a . 'deleted', 'uses' => 'SubscriptionPricingController@deleted']);
	Route::post('subscription/pricing/destroy', ['as' => $a . 'destroy', 'uses' => 'SubscriptionPricingController@destroy']);	
	Route::post('subscription/pricing/getpricing', ['as' => $a . 'getpricing', 'uses' => 'SubscriptionPricingController@getpricing']);
	Route::post('subscription/pricing/getcurrency', ['as' => $a . 'getcurrency', 'uses' => 'SubscriptionPricingController@getcurrency']);
	
	
	//Admin States Root
	Route::get('/states', ['as' => $a . 'states', 'uses' => 'StatesController@index']);
	Route::post('states/added', ['as' => $a . 'added', 'uses' => 'StatesController@added']);
	Route::post('states/updated', ['as' => $a . 'updated', 'uses' => 'StatesController@updated']);
	Route::post('states/deleted', ['as' => $a . 'deleted', 'uses' => 'StatesController@deleted']);
	Route::post('states/destroy', ['as' => $a . 'destroy', 'uses' => 'StatesController@destroy']);	
	Route::post('states/getstates', ['as' => $a . 'getstates', 'uses' => 'StatesController@getstates']);
	Route::post('states/enable', ['as' => $a . 'enable', 'uses' => 'StatesController@enable']);
	Route::post('states/disable', ['as' => $a . 'deleted', 'uses' => 'StatesController@disable']);	

	//Admin Cities Root
	Route::get('/cities', ['as' => $a . 'cities', 'uses' => 'CitiesController@index']);
	Route::post('cities/added', ['as' => $a . 'added', 'uses' => 'CitiesController@added']);
	Route::post('cities/updated', ['as' => $a . 'updated', 'uses' => 'CitiesController@updated']);
	Route::post('cities/deleted', ['as' => $a . 'deleted', 'uses' => 'CitiesController@deleted']);
	Route::post('cities/destroy', ['as' => $a . 'destroy', 'uses' => 'CitiesController@destroy']);	
	Route::post('cities/getcities', ['as' => $a . 'getcities', 'uses' => 'CitiesController@getcities']);
	Route::post('cities/enable', ['as' => $a . 'enable', 'uses' => 'CitiesController@enable']);
	Route::post('cities/disable', ['as' => $a . 'deleted', 'uses' => 'CitiesController@disable']);		
	
	//Admin Users Access Modules Root
	Route::get('/roles', ['as' => $a . 'roles', 'uses' => 'UserAccessModulesController@index']);
	Route::post('roles/added', ['as' => $a . 'added', 'uses' => 'UserAccessModulesController@added']);
	Route::post('roles/updated', ['as' => $a . 'updated', 'uses' => 'UserAccessModulesController@updated']);
	Route::post('roles/deleted', ['as' => $a . 'deleted', 'uses' => 'UserAccessModulesController@deleted']);
	Route::post('roles/destroy', ['as' => $a . 'destroy', 'uses' => 'UserAccessModulesController@destroy']);	
	Route::post('roles/getroles', ['as' => $a . 'getroles', 'uses' => 'UserAccessModulesController@getroles']);
	
	//Admin Users Root
	Route::get('/users', ['as' => $a . 'users', 'uses' => 'AdminController@users']);
	Route::post('users/added', ['as' => $a . 'added', 'uses' => 'AdminController@added']);
	Route::post('users/updated', ['as' => $a . 'updated', 'uses' => 'AdminController@updated']);
	Route::post('users/deleted', ['as' => $a . 'deleted', 'uses' => 'AdminController@deleted']);
	Route::post('users/destroy', ['as' => $a . 'destroy', 'uses' => 'AdminController@destroy']);	
	Route::post('users/getusers', ['as' => $a . 'getusers', 'uses' => 'AdminController@getusers']);
	
	//Admin Ads Position Root
	Route::get('ads/position', ['as' => $a . 'position', 'uses' => 'AdsPositionController@index']);
	Route::post('ads/position/added', ['as' => $a . 'added', 'uses' => 'AdsPositionController@added']);
	Route::post('ads/position/updated', ['as' => $a . 'updated', 'uses' => 'AdsPositionController@updated']);
	Route::post('ads/position/deleted', ['as' => $a . 'deleted', 'uses' => 'AdsPositionController@deleted']);
	Route::post('ads/position/destroy', ['as' => $a . 'destroy', 'uses' => 'AdsPositionController@destroy']);	
	Route::post('ads/position/getposition', ['as' => $a . 'getposition', 'uses' => 'AdsPositionController@getposition']);
	
	
	//Admin Ads Slot Placement Root
	Route::get('ads/slotplacement', ['as' => $a . 'slotplacement', 'uses' => 'AdsSlotPlacementController@index']);
	Route::post('ads/slotplacement/added', ['as' => $a . 'added', 'uses' => 'AdsSlotPlacementController@added']);
	Route::post('ads/slotplacement/updated', ['as' => $a . 'updated', 'uses' => 'AdsSlotPlacementController@updated']);
	Route::post('ads/slotplacement/deleted', ['as' => $a . 'deleted', 'uses' => 'AdsSlotPlacementController@deleted']);
	Route::post('ads/slotplacement/destroy', ['as' => $a . 'destroy', 'uses' => 'AdsSlotPlacementController@destroy']);	
	Route::post('ads/slotplacement/getslotplacement', ['as' => $a . 'getslotplacement', 'uses' => 'AdsSlotPlacementController@getslotplacement']);
	
	
	//Admin Ads Mode Advertisement Root
	Route::get('ads/modeads', ['as' => $a . 'modeads', 'uses' => 'AdsModeAdvertisementController@index']);
	Route::post('ads/modeads/added', ['as' => $a . 'added', 'uses' => 'AdsModeAdvertisementController@added']);
	Route::post('ads/modeads/updated', ['as' => $a . 'updated', 'uses' => 'AdsModeAdvertisementController@updated']);
	Route::post('ads/modeads/deleted', ['as' => $a . 'deleted', 'uses' => 'AdsModeAdvertisementController@deleted']);
	Route::post('ads/modeads/destroy', ['as' => $a . 'destroy', 'uses' => 'AdsModeAdvertisementController@destroy']);	
	Route::post('ads/modeads/getmodeads', ['as' => $a . 'getmodeads', 'uses' => 'AdsModeAdvertisementController@getmodeads']);
	
	//Admin Ads Duration Root
	Route::get('ads/duration', ['as' => $a . 'duration', 'uses' => 'AdsDurationController@index']);
	Route::post('ads/duration/added', ['as' => $a . 'added', 'uses' => 'AdsDurationController@added']);
	Route::post('ads/duration/updated', ['as' => $a . 'updated', 'uses' => 'AdsDurationController@updated']);
	Route::post('ads/duration/deleted', ['as' => $a . 'deleted', 'uses' => 'AdsDurationController@deleted']);
	Route::post('ads/duration/destroy', ['as' => $a . 'destroy', 'uses' => 'AdsDurationController@destroy']);	
	Route::post('ads/duration/getduration', ['as' => $a . 'getduration', 'uses' => 'AdsDurationController@getduration']);
	
	
	//Admin Ads Pricing Root
	Route::get('ads/pricing', ['as' => $a . 'pricing', 'uses' => 'AdsPricingController@index']);
	Route::post('ads/pricing/added', ['as' => $a . 'added', 'uses' => 'AdsPricingController@added']);
	Route::post('ads/pricing/updated', ['as' => $a . 'updated', 'uses' => 'AdsPricingController@updated']);
	Route::post('ads/pricing/deleted', ['as' => $a . 'deleted', 'uses' => 'AdsPricingController@deleted']);
	Route::post('ads/pricing/destroy', ['as' => $a . 'destroy', 'uses' => 'AdsPricingController@destroy']);	
	Route::post('ads/pricing/getpricing', ['as' => $a . 'getpricing', 'uses' => 'AdsPricingController@getpricing']);
	
	
	
	
	//Admin Category Slug Root
	Route::get('category/slug', ['as' => $a . 'slug', 'uses' => 'CategorySlugController@index']);
	Route::post('category/slug/added', ['as' => $a . 'added', 'uses' => 'CategorySlugController@added']);
	Route::post('category/slug/updated', ['as' => $a . 'updated', 'uses' => 'CategorySlugController@updated']);
	Route::post('category/slug/deleted', ['as' => $a . 'deleted', 'uses' => 'CategorySlugController@deleted']);
	Route::post('category/slug/destroy', ['as' => $a . 'destroy', 'uses' => 'CategorySlugController@destroy']);	
	Route::post('category/slug/getcategoryslug', ['as' => $a . 'getcategoryslug', 'uses' => 'CategorySlugController@getcategoryslug']);
	
	
	
	//Admin Category Root
	Route::get('/category', ['as' => $a . 'category', 'uses' => 'CategoryController@index']);
	Route::post('category/added', ['as' => $a . 'added', 'uses' => 'CategoryController@added']);
	Route::post('category/updated', ['as' => $a . 'updated', 'uses' => 'CategoryController@updated']);
	Route::post('category/deleted', ['as' => $a . 'deleted', 'uses' => 'CategoryController@deleted']);
	Route::post('category/destroy', ['as' => $a . 'destroy', 'uses' => 'CategoryController@destroy']);	
	Route::post('category/getcategory', ['as' => $a . 'getcategory', 'uses' => 'CategoryController@getcategory']);
	
	//Admin Menus Root
	Route::get('/menu', ['as' => $a . 'menu', 'uses' => 'MenuController@index']);
	Route::post('menu/added', ['as' => $a . 'added', 'uses' => 'MenuController@added']);
	Route::post('menu/updated', ['as' => $a . 'updated', 'uses' => 'MenuController@updated']);
	Route::post('menu/deleted', ['as' => $a . 'deleted', 'uses' => 'MenuController@deleted']);
	Route::post('menu/destroy', ['as' => $a . 'destroy', 'uses' => 'MenuController@destroy']);	
	Route::post('menu/getmenu', ['as' => $a . 'getmenu', 'uses' => 'MenuController@getmenu']);
	
	//Admin Pages Root
	Route::get('/page', ['as' => $a . 'page', 'uses' => 'PageController@index']);
	Route::post('page/added', ['as' => $a . 'added', 'uses' => 'PageController@added']);
	Route::post('page/updated', ['as' => $a . 'updated', 'uses' => 'PageController@updated']);
	Route::post('page/deleted', ['as' => $a . 'deleted', 'uses' => 'PageController@deleted']);
	Route::post('page/destroy', ['as' => $a . 'destroy', 'uses' => 'PageController@destroy']);	
	Route::post('page/getpage', ['as' => $a . 'getpage', 'uses' => 'PageController@getpage']);
	
	//Admin Blogs Root
	Route::get('/blog', ['as' => $a . 'blog', 'uses' => 'BlogController@index']);
	Route::post('blog/added', ['as' => $a . 'added', 'uses' => 'BlogController@added']);
	Route::post('blog/updated', ['as' => $a . 'updated', 'uses' => 'BlogController@updated']);
	Route::post('blog/deleted', ['as' => $a . 'deleted', 'uses' => 'BlogController@deleted']);
	Route::post('blog/destroy', ['as' => $a . 'destroy', 'uses' => 'BlogController@destroy']);	
	Route::post('blog/getblogs', ['as' => $a . 'getblogs', 'uses' => 'BlogController@getblogs']);
	
	//Admin News Root
	Route::get('/news', ['as' => $a . 'news', 'uses' => 'NewsController@index']);
	Route::post('news/added', ['as' => $a . 'added', 'uses' => 'NewsController@added']);
	Route::post('news/updated', ['as' => $a . 'updated', 'uses' => 'NewsController@updated']);
	Route::post('news/deleted', ['as' => $a . 'deleted', 'uses' => 'NewsController@deleted']);
	Route::post('news/destroy', ['as' => $a . 'destroy', 'uses' => 'NewsController@destroy']);	
	Route::post('news/getnews', ['as' => $a . 'getnews', 'uses' => 'NewsController@getnews']);
	
	//Admin Testimonials Root
	Route::get('/testimonials', ['as' => $a . 'testimonials', 'uses' => 'TestimonialsController@index']);
	Route::post('testimonials/added', ['as' => $a . 'added', 'uses' => 'TestimonialsController@added']);
	Route::post('testimonials/updated', ['as' => $a . 'updated', 'uses' => 'TestimonialsController@updated']);
	Route::post('testimonials/deleted', ['as' => $a . 'deleted', 'uses' => 'TestimonialsController@deleted']);
	Route::post('testimonials/destroy', ['as' => $a . 'destroy', 'uses' => 'TestimonialsController@destroy']);	
	Route::post('testimonials/gettestimonials', ['as' => $a . 'gettestimonials', 'uses' => 'TestimonialsController@gettestimonials']);
	
	//Admin Merchants Users Root
	Route::get('merchants/users', ['as' => $a . 'users', 'uses' => 'MerchantUserController@users']);
	Route::post('merchants/users/added', ['as' => $a . 'added', 'uses' => 'MerchantUserController@added']);
	Route::post('merchants/users/updated', ['as' => $a . 'updated', 'uses' => 'MerchantUserController@updated']);
	Route::post('merchants/users/deleted', ['as' => $a . 'deleted', 'uses' => 'MerchantUserController@deleted']);
	Route::post('merchants/users/destroy', ['as' => $a . 'destroy', 'uses' => 'MerchantUserController@destroy']);
	Route::post('merchants/users/enable', ['as' => $a . 'enable', 'uses' => 'MerchantUserController@enable']);
	Route::post('merchants/users/disable', ['as' => $a . 'deleted', 'uses' => 'MerchantUserController@disable']);	
	Route::post('merchants/users/getusers', ['as' => $a . 'getusers', 'uses' => 'MerchantUserController@getusers']);
	
	//Admin Merchants Listing Root
	Route::get('merchants/listing', ['as' => $a . 'listing', 'uses' => 'ListingController@index']);
	Route::post('merchants/listing/added', ['as' => $a . 'added', 'uses' => 'ListingController@added']);
	Route::post('merchants/listing/updated', ['as' => $a . 'updated', 'uses' => 'ListingController@updated']);
	Route::post('merchants/listing/deleted', ['as' => $a . 'deleted', 'uses' => 'ListingController@deleted']);
	Route::post('merchants/listing/destroy', ['as' => $a . 'destroy', 'uses' => 'ListingController@destroy']);
	Route::post('merchants/listing/enable', ['as' => $a . 'enable', 'uses' => 'ListingController@enable']);
	Route::post('merchants/listing/disable', ['as' => $a . 'deleted', 'uses' => 'ListingController@disable']);
	Route::post('merchants/listing/getlisting', ['as' => $a . 'getlisting', 'uses' => 'ListingController@getlisting']);
	Route::post('merchants/listing/getsubcategory', ['as' => $a . 'getsubcategory', 'uses' => 'ListingController@getsubcategory']);
	Route::post('merchants/listing/getstates', ['as' => $a . 'getstates', 'uses' => 'ListingController@getstates']);
	Route::post('merchants/listing/getcities', ['as' => $a . 'getcities', 'uses' => 'ListingController@getcities']);
	
	//Admin Merchants Campaigns Root
	Route::get('merchants/campaigns', ['as' => $a . 'campaigns', 'uses' => 'CampaignsController@index']);
	Route::post('merchants/campaigns/added', ['as' => $a . 'added', 'uses' => 'CampaignsController@added']);
	Route::post('merchants/campaigns/updated', ['as' => $a . 'updated', 'uses' => 'CampaignsController@updated']);
	Route::post('merchants/campaigns/deleted', ['as' => $a . 'deleted', 'uses' => 'CampaignsController@deleted']);
	Route::post('merchants/campaigns/destroy', ['as' => $a . 'destroy', 'uses' => 'CampaignsController@destroy']);
	Route::post('merchants/campaigns/enable', ['as' => $a . 'enable', 'uses' => 'CampaignsController@enable']);
	Route::post('merchants/campaigns/disable', ['as' => $a . 'deleted', 'uses' => 'CampaignsController@disable']);
	Route::post('merchants/campaigns/getcampaigns', ['as' => $a . 'getcampaigns', 'uses' => 'CampaignsController@getcampaigns']);
	Route::post('merchants/campaigns/getstates', ['as' => $a . 'getstates', 'uses' => 'CampaignsController@getstates']);
	Route::post('merchants/campaigns/getcities', ['as' => $a . 'getcities', 'uses' => 'CampaignsController@getcities']);
	

	

});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function()
{
    $a = 'user.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'UserController@getHome']);

    Route::group(['middleware' => 'activated'], function ()
    {
        $m = 'activated.';
        Route::get('protected', ['as' => $m . 'protected', 'uses' => 'UserController@getProtected']);
    });

});

Route::group(['prefix' => 'merchant', 'middleware' => 'auth:merchant'], function()
{
    $a = 'merchant.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'MerchantController@getHome']);
	
	//Admin Merchants Listing Root
	Route::get('listing', ['as' => $a . 'listing', 'uses' => 'MerchantController@index']);
	Route::post('listing/added', ['as' => $a . 'added', 'uses' => 'MerchantController@added']);
	Route::post('listing/updated', ['as' => $a . 'updated', 'uses' => 'MerchantController@updated']);
	Route::post('listing/deleted', ['as' => $a . 'deleted', 'uses' => 'MerchantController@deleted']);
	Route::post('listing/destroy', ['as' => $a . 'destroy', 'uses' => 'MerchantController@destroy']);
	Route::post('listing/enable', ['as' => $a . 'enable', 'uses' => 'MerchantController@enable']);
	Route::post('listing/disable', ['as' => $a . 'deleted', 'uses' => 'MerchantController@disable']);
	Route::post('listing/getlisting', ['as' => $a . 'getlisting', 'uses' => 'MerchantController@getlisting']);
	Route::post('listing/getsubcategory', ['as' => $a . 'getsubcategory', 'uses' => 'MerchantController@getsubcategory']);
	Route::post('listing/getstates', ['as' => $a . 'getstates', 'uses' => 'MerchantController@getstates']);
	Route::post('listing/getcities', ['as' => $a . 'getcities', 'uses' => 'MerchantController@getcities']);
	
	//Admin Merchants Campaigns Root
	Route::get('campaigns', ['as' => $a . 'campaigns', 'uses' => 'CampaignsController@index']);
	Route::post('campaigns/added', ['as' => $a . 'added', 'uses' => 'CampaignsController@added']);
	Route::post('campaigns/updated', ['as' => $a . 'updated', 'uses' => 'CampaignsController@updated']);
	Route::post('campaigns/deleted', ['as' => $a . 'deleted', 'uses' => 'CampaignsController@deleted']);
	Route::post('campaigns/destroy', ['as' => $a . 'destroy', 'uses' => 'CampaignsController@destroy']);
	Route::post('campaigns/enable', ['as' => $a . 'enable', 'uses' => 'CampaignsController@enable']);
	Route::post('campaigns/disable', ['as' => $a . 'deleted', 'uses' => 'CampaignsController@disable']);
	Route::post('campaigns/getcampaigns', ['as' => $a . 'getcampaigns', 'uses' => 'CampaignsController@getcampaigns']);
	Route::post('campaigns/getstates', ['as' => $a . 'getstates', 'uses' => 'CampaignsController@getstates']);
	Route::post('campaigns/getcities', ['as' => $a . 'getcities', 'uses' => 'CampaignsController@getcities']);
	

    Route::group(['middleware' => 'activated'], function ()
    {
        $m = 'activated.';
        Route::get('protected', ['as' => $m . 'protected', 'uses' => 'MerchantController@getProtected']);
    });

});

Route::group(['middleware' => 'auth:all'], function()
{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/activate/{token}', ['as' => $a . 'activate', 'uses' => 'ActivateController@activate']);
    Route::get('/activate', ['as' => $a . 'activation-resend', 'uses' => 'ActivateController@resend']);
    Route::get('not-activated', ['as' => 'not-activated', 'uses' => function () {
        return view('errors.not-activated');
    }]);
});

Auth::routes(['login' => 'auth.login']);

//WEB SERVICES
Route::group(['prefix' => 'api', 'middleware' => 'api'], function()
{   
    Route::get('category','ApiCategoryController@index');
	Route::get('category/show/{id}','ApiCategoryController@show');
	Route::get('category/subcategory/{id}','ApiCategoryController@subcategory');	
	Route::get('listing','ApiListingController@index');
	Route::get('listing/show/{id}','ApiListingController@show');
	Route::get('campaigns','ApiCampaignsController@index');
	Route::get('campaigns/show/{id}','ApiCampaignsController@show');

});


//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Clear Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
Auth::routes();

Route::get('/home', 'HomeController@index');
