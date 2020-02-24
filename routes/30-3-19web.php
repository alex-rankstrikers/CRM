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


Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function()
{
    $a = 'admin.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'AdminController@index']);	
	//Route::get('/users', ['as' => $a . 'users', 'uses' => 'AdminController@users']);
	//Route::get('/get_users', ['as' => $a . 'get_users', 'uses' => 'AdminController@getUsers']);
	
	//Route::get('/roles', ['as' => $a . 'users', 'uses' => 'AdminController@roles']);
	
//Venue Managemrnt Roots
	//Admin Subscription Pricing Root
	Route::post('dropzone/uploadFiles', ['as' => $a . 'uploadFiles', 'uses' => 'DropzoneController@uploadFiles']);
	//Route::post('merchants/venue/img_save_to_file', ['as' => $a . 'img_save_to_file', 'uses' => 'VenueController@img_save_to_file']);
	
	//Route::post('merchants/venue/img_crop_to_file', ['as' => $a . 'img_crop_to_file', 'uses' => 'VenueController@img_crop_to_file']);

	Route::get('hotels/benefits', ['as' => $a . 'benefits', 'uses' => 'BenefitsController@index']);
	Route::post('hotels/benefits/added', ['as' => $a . 'added', 'uses' => 'BenefitsController@added']);
	Route::post('hotels/benefits/updated', ['as' => $a . 'updated', 'uses' => 'BenefitsController@updated']);
	Route::post('hotels/benefits/deleted', ['as' => $a . 'deleted', 'uses' => 'BenefitsController@deleted']);
	Route::post('hotels/benefits/destroy', ['as' => $a . 'destroy', 'uses' => 'BenefitsController@destroy']);	
	Route::post('hotels/benefits/getcapacity', ['as' => $a . 'getcapacity', 'uses' => 'BenefitsController@getcapacity']);

	
	Route::get('hotels/amenities', ['as' => $a . 'amenities', 'uses' => 'AmenitiesController@index']);
	Route::post('hotels/amenities/added', ['as' => $a . 'added', 'uses' => 'AmenitiesController@added']);
	Route::post('hotels/amenities/updated', ['as' => $a . 'updated', 'uses' => 'AmenitiesController@updated']);
	Route::post('hotels/amenities/deleted', ['as' => $a . 'deleted', 'uses' => 'AmenitiesController@deleted']);
	Route::post('hotels/amenities/destroy', ['as' => $a . 'destroy', 'uses' => 'AmenitiesController@destroy']);	
	Route::post('hotels/amenities/getcapacity', ['as' => $a . 'getcapacity', 'uses' => 'AmenitiesController@getcapacity']);
	
	
	Route::get('hotels/features', ['as' => $a . 'features', 'uses' => 'VenueFeaturesController@index']);
	Route::post('hotels/features/added', ['as' => $a . 'added', 'uses' => 'VenueFeaturesController@added']);
	Route::post('hotels/features/updated', ['as' => $a . 'updated', 'uses' => 'VenueFeaturesController@updated']);
	Route::post('hotels/features/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueFeaturesController@deleted']);
	Route::post('hotels/features/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueFeaturesController@destroy']);	
	Route::post('hotels/features/getfeatures', ['as' => $a . 'getcapacity', 'uses' => 'VenueFeaturesController@getfeatures']);
	
	Route::get('hotels/food-drink', ['as' => $a . 'food-drink', 'uses' => 'VenueFoodDrinkController@index']);
	Route::post('hotels/food-drink/added', ['as' => $a . 'added', 'uses' => 'VenueFoodDrinkController@added']);
	Route::post('hotels/food-drink/updated', ['as' => $a . 'updated', 'uses' => 'VenueFoodDrinkController@updated']);
	Route::post('hotels/food-drink/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueFoodDrinkController@deleted']);
	Route::post('hotels/food-drink/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueFoodDrinkController@destroy']);	
	Route::post('hotels/food-drink/getfooddrink', ['as' => $a . 'getfooddrink', 'uses' => 'VenueFoodDrinkController@getfooddrink']);
	
	Route::get('hotels/licensing', ['as' => $a . 'licensing', 'uses' => 'VenueLicensingController@index']);
	Route::post('hotels/licensing/added', ['as' => $a . 'added', 'uses' => 'VenueLicensingController@added']);
	Route::post('hotels/licensing/updated', ['as' => $a . 'updated', 'uses' => 'VenueLicensingController@updated']);
	Route::post('hotels/licensing/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueLicensingController@deleted']);
	Route::post('hotels/licensing/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueLicensingController@destroy']);	
	Route::post('hotels/licensing/getlicensing', ['as' => $a . 'getlicensing', 'uses' => 'VenueLicensingController@getlicensing']);



	Route::get('hotels/business', ['as' => $a . 'business', 'uses' => 'VenueBusinessController@index']);
	Route::post('hotels/business/added', ['as' => $a . 'added', 'uses' => 'VenueBusinessController@added']);
	Route::post('hotels/business/updated', ['as' => $a . 'updated', 'uses' => 'VenueBusinessController@updated']);
	Route::post('hotels/business/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueBusinessController@deleted']);
	Route::post('hotels/business/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueBusinessController@destroy']);	
	Route::post('hotels/business/getlicensing', ['as' => $a . 'getlicensing', 'uses' => 'VenueBusinessController@getlicensing']);


	Route::get('hotels/capacity', ['as' => $a . 'pricing', 'uses' => 'VenueCapacityController@index']);
	Route::post('hotels/capacity/added', ['as' => $a . 'added', 'uses' => 'VenueCapacityController@added']);
	Route::post('hotels/capacity/updated', ['as' => $a . 'updated', 'uses' => 'VenueCapacityController@updated']);
	Route::post('hotels/capacity/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueCapacityController@deleted']);
	Route::post('hotels/capacity/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueCapacityController@destroy']);	
	Route::post('hotels/capacity/getcapacity', ['as' => $a . 'getcapacity', 'uses' => 'VenueCapacityController@getcapacity']);


	
	
	Route::get('venue/restrictions', ['as' => $a . 'restrictions', 'uses' => 'VenueRestrictionsController@index']);
	Route::post('venue/restrictions/added', ['as' => $a . 'added', 'uses' => 'VenueRestrictionsController@added']);
	Route::post('venue/restrictions/updated', ['as' => $a . 'updated', 'uses' => 'VenueRestrictionsController@updated']);
	Route::post('venue/restrictions/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueRestrictionsController@deleted']);
	Route::post('venue/restrictions/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueRestrictionsController@destroy']);	
	Route::post('venue/restrictions/getrestrictions', ['as' => $a . 'getrestrictions', 'uses' => 'VenueRestrictionsController@getrestrictions']);
	
	
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
	
	
	//Admin Merchants Venue Root
	Route::get('merchants/hotels', ['as' => $a . 'venue', 'uses' => 'VenueController@index']);
	Route::post('merchants/hotels/added', ['as' => $a . 'added', 'uses' => 'VenueController@added']);
	Route::post('merchants/hotels/updated', ['as' => $a . 'updated', 'uses' => 'VenueController@updated']);
	Route::post('merchants/hotels/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueController@deleted']);
	Route::post('merchants/hotels/remove', ['as' => $a . 'remove', 'uses' => 'VenueController@remove']);
	Route::post('merchants/hotels/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueController@destroy']);
	Route::post('merchants/hotels/enable', ['as' => $a . 'enable', 'uses' => 'VenueController@enable']);
	Route::post('merchants/hotels/disable', ['as' => $a . 'deleted', 'uses' => 'VenueController@disable']);
	Route::post('merchants/hotels/getvenue', ['as' => $a . 'getvenue', 'uses' => 'VenueController@getvenue']);
//	Route::post('merchants/hotels/getsubcategory', ['as' => $a . 'getsubcategory', 'uses' => 'VenueController@getsubcategory']);
	Route::post('merchants/hotels/getstates', ['as' => $a . 'getstates', 'uses' => 'VenueController@getstates']);
	Route::post('merchants/hotels/getcities', ['as' => $a . 'getcities', 'uses' => 'VenueController@getcities']);
	
	
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
	// Leads
	
	Route::get('leads', ['as' => $a . 'leads', 'uses' => 'LeadsController@index']);
	Route::post('leads/getleads', ['as' => $a . 'getleads', 'uses' => 'LeadsController@getleads']);
	Route::post('leads/updated', ['as' => $a . 'updated', 'uses' => 'LeadsController@updated']);
	Route::post('leads/deleted', ['as' => $a . 'deleted', 'uses' => 'LeadsController@deleted']);
	Route::post('leads/destroy', ['as' => $a . 'destroy', 'uses' => 'LeadsController@destroy']);
	
	
	Route::get('ask-venue-expert', ['as' => $a . 'AskVenueExpertController', 'uses' => 'AskVenueExpertController@index']);
	Route::post('ask-venue-expert/getleads', ['as' => $a . 'getleads', 'uses' => 'AskVenueExpertController@getleads']);
	Route::post('ask-venue-expert/updated', ['as' => $a . 'updated', 'uses' => 'AskVenueExpertController@updated']);
	Route::post('ask-venue-expert/deleted', ['as' => $a . 'deleted', 'uses' => 'AskVenueExpertController@deleted']);
	Route::post('ask-venue-expert/destroy', ['as' => $a . 'destroy', 'uses' => 'AskVenueExpertController@destroy']);
	
	
	
	Route::get('ask_venue_expert', ['as' => $a . 'listing', 'uses' => 'LeadsController@ask_venue_expert']);
	Route::post('ask_venue_expert/updated', ['as' => $a . 'updated', 'uses' => 'ListingController@ask_venue_expert_updated']);
	
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
    Route::get('/', ['as' => $a . 'home', 'uses' => 'MerchantController@getDashboard']);
	Route::get('/venue-type', ['as' => $a . 'venue-type', 'uses' => 'MerchantController@getVenueType']);
	Route::post('/venue-type-updated', ['as' => $a . 'venue-type-updated', 'uses' => 'MerchantController@updatedVenueType']);
	
	Route::get('/add-venue', ['as' => $a . 'add-venue', 'uses' => 'MerchantController@addVenue']);	
	Route::get('/edit-venue', ['as' => $a . 'edit', 'uses' => 'MerchantController@edit']);
	Route::get('/edit-profile', ['as' => $a . 'edit_profile', 'uses' => 'MerchantController@edit_profile']);
	Route::get('/update-password', ['as' => $a . 'update_password', 'uses' => 'MerchantController@update_password']);
	Route::post('/updated', ['as' => $a . 'updated', 'uses' => 'MerchantController@updated']);
	Route::post('/getvenue', ['as' => $a . 'getvenue', 'uses' => 'MerchantController@getvenue']);
	
	// Add Hotel
	Route::get('/add-hotel', ['as' => $a . 'add-hotel', 'uses' => 'MerchantController@addHotel']);
	Route::post('/hotel/added', ['as' => $a . 'added', 'uses' => 'MerchantController@added']);	
	Route::get('/edit-hotel', ['as' => $a . 'edit-hotel', 'uses' => 'MerchantController@editHotel']);
	Route::post('/gethotel', ['as' => $a . 'get-hotel', 'uses' => 'MerchantController@getHotel']);


	Route::get('/add-room/{id}', ['as' => $a . 'add-room', 'uses' => 'MerchantController@addRoom']);
	Route::post('/add-room/{id}/added', ['as' => $a . 'added', 'uses' => 'MerchantController@addedRoom']);	
	Route::get('/view-rooms/{id}', ['as' => $a . 'view-rooms', 'uses' => 'MerchantController@ViewRooms']);
	Route::post('rooms/{id}/updated', ['as' => $a . 'updated', 'uses' => 'MerchantController@updatedRoom']);
	Route::post('/getroom', ['as' => $a . 'get-room', 'uses' => 'MerchantController@getRoom']);
	
	
	Route::get('/add-venue-contact', ['as' => $a . 'add-venue-contact', 'uses' => 'MerchantController@addVenueContact']);
	Route::get('/edit-venue-contact', ['as' => $a . 'add-venue-contact', 'uses' => 'MerchantController@editVenueContact']);
	Route::post('/added-venue-contact', ['as' => $a . 'added-venue-contact', 'uses' => 'MerchantController@addedVenueContact']);
	Route::post('/updated-venue-contact', ['as' => $a . 'updated-venue-contact', 'uses' => 'MerchantController@updatedVenueContact']);
	Route::post('/get-venue-contact', ['as' => $a . 'get-venue-contact', 'uses' => 'MerchantController@getVenuecontact']);
	Route::post('/deleted-venue-contact', ['as' => $a . 'deleted-venue-contact', 'uses' => 'MerchantController@deletedVenueContact']);
	

	
	/*Stripe Payment Gateway*/
	
	Route::get('/payment', ['as' => $a . 'payment', 'uses' => 'MerchantController@payment']);
	Route::post('/stripe', ['as' => $a . 'stripe', 'uses' => 'MerchantController@postPaymentWithStripe']);
	
	Route::get('/success', ['as' => $a . 'success', 'uses' => 'MerchantController@paymentSuccess']);
	Route::get('/htmltopdfview/{id}', ['as' => $a . 'htmltopdfview', 'uses' => 'MerchantController@htmltopdfview']);
	Route::get('/failure', ['as' => $a . 'failure', 'uses' => 'MerchantController@paymentFailure']);
	Route::get('/orders', ['as' => $a . 'orders', 'uses' => 'MerchantController@orders']);
	
	Route::get('/enquiry', ['as' => $a . 'enquiry', 'uses' => 'MerchantController@getEnquiry']);
	Route::get('/enquiry/{id}', ['as' => $a . 'enquiry', 'uses' => 'MerchantController@getEnquiry']);
	Route::get('/lead-details/{id}', ['as' => $a . 'lead-details', 'uses' => 'MerchantController@getleadDetails']);
	//Route::get('/enquiry/{id}', ['as' => $a . 'enquiry', 'uses' => 'MerchantController@getEnquiry']);
	Route::get('/payment-plan', ['as' => $a . 'payment-type', 'uses' => 'MerchantController@getUserPaymentType']);
	Route::post('/payment-updated', ['as' => $a . 'payment-updated', 'uses' => 'MerchantController@updatedUserPayment']);
	
	Route::post('/deleted', ['as' => $a . 'payment-updated', 'uses' => 'MerchantController@deleted']);
	
	Route::post('/getstates', ['as' => $a . 'getstates', 'uses' => 'MerchantController@getstates']);
	Route::post('/getcities', ['as' => $a . 'getcities', 'uses' => 'MerchantController@getcities']);
	Route::post('/added', ['as' => $a . 'added', 'uses' => 'MerchantController@added']);
	Route::post('venue/img_save_to_file', ['as' => $a . 'img_save_to_file', 'uses' => 'VenueController@img_save_to_file']);
	
	Route::post('venue/img_crop_to_file', ['as' => $a . 'img_crop_to_file', 'uses' => 'VenueController@img_crop_to_file']);
	
	Route::post('/dropzone/uploadFiles', ['as' => $a . 'uploadFiles', 'uses' => 'DropzoneController@uploadFiles']);
	
	Route::post('/hotels/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueController@deleted']);
	Route::post('/hotels/remove', ['as' => $a . 'remove', 'uses' => 'VenueController@remove']);
	Route::post('hotels/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueController@destroy']);
	
	
	
	/*
	Route::post('merchants/venue/added', ['as' => $a . 'added', 'uses' => 'VenueController@added']);
	Route::post('merchants/venue/updated', ['as' => $a . 'updated', 'uses' => 'VenueController@updated']);
	Route::post('merchants/venue/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueController@deleted']);*/
	
	
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



$s = 'public.';
Route::get('/',         ['as' => $s . 'home',   'uses' => 'PagesController@getHome']);
Route::post('/added', ['as' => $s . 'added', 'uses' => 'PagesController@added']);

Route::get('/about-us',         ['as' => $s . 'about-us',   'uses' => 'PagesController@about_us']);
Route::get('/jobs',         ['as' => $s . 'jobs',   'uses' => 'PagesController@jobs']);
Route::get('/media-press',         ['as' => $s . 'media-press',   'uses' => 'PagesController@media_press']);
Route::get('/how-it-works-users',         ['as' => $s . 'how-it-works-users',   'uses' => 'PagesController@how_it_works']);
Route::get('/how-it-works-venues',         ['as' => $s . 'how-it-works-venues',   'uses' => 'PagesController@how_it_works_venues']);
Route::get('/terms-and-policies',         ['as' => $s . 'terms-and-policies',   'uses' => 'PagesController@terms_and_policies']);

Route::get('/get-all-category',         ['as' => $s . 'getallcategory',   'uses' => 'PagesController@getallcategory']);
Route::get('/faq-users',         ['as' => $s . 'faq-users',   'uses' => 'PagesController@faq']);
Route::get('/faq-venues',         ['as' => $s . 'faq-venues',   'uses' => 'PagesController@faqVenues']);

Route::get('/contact-us',         ['as' => $s . 'contact_us',   'uses' => 'ContactUsController@getHome']);

Route::get('/venues',         ['as' => $s . 'list_your_venue',   'uses' => 'ListYourVenueController@getHome']);

Route::get('/venues/{slug}',         ['as' => $s . 'list_your_venue',   'uses' => 'ListYourVenueController@getHome']);
Route::get('/venue-details/{id}',         ['as' => $s . 'venue_details',   'uses' => 'ListYourVenueController@venue_details']);
Route::post('/venue-enquiry-added', ['as' => $s . 'venue_enquiry', 'uses' => 'ListYourVenueController@added']);
Route::post('/venue-enquiry-multi-added', ['as' => $s . 'venue_enquiry', 'uses' => 'ListYourVenueController@multiadded']);
Route::post('/venue-enquiry-added-ajax', ['as' => $s . 'venue_enquiry-ajax', 'uses' => 'ListYourVenueController@addedAjax']);

Route::get('/onload-venues/{page}',         ['as' => $s . 'onload_venues',   'uses' => 'ListYourVenueController@onload_venues']);
Route::get('/onload-venues/{page}/{slug}',         ['as' => $s . 'onload_venues',   'uses' => 'ListYourVenueController@onload_venues']);

Route::get('/onload-venues-more-spaces-host/{page}',         ['as' => $s . 'onload-venues-more-spaces-host',   'uses' => 'ListYourVenueController@getOnloadVenuesMoreSpacesHost']);
Route::get('/onload-venues-more-spaces-host/{page}/{slug}',         ['as' => $s . 'onload-venues-more-spaces-host',   'uses' => 'ListYourVenueController@getOnloadVenuesMoreSpacesHost']);

Route::get('/onload-venues-similar-spaces/{page}',         ['as' => $s . 'onload-venues-similar-spaces',   'uses' => 'ListYourVenueController@getOnloadVenuesSimilarSpaces']);
Route::get('/onload-venues-similar-spaces/{page}/{slug}',         ['as' => $s . 'onload_venues',   'uses' => 'ListYourVenueController@getOnloadVenuesSimilarSpaces']);



Route::get('/onload-venues-search/{page}/{search}/{location}',         ['as' => $s . 'onload-venues-search',   'uses' => 'ListYourVenueController@onload_venues_search']);

Route::post('/list-your-venue/added', ['as' => $s . 'added', 'uses' => 'ListYourVenueController@added']);
Route::get('/ask-a-venue-expert', ['as' => $s . 'ask-a-venue-expert', 'uses' => 'ListYourVenueController@ask_a_venue_expert']);
Route::post('/ask-a-venue-added', ['as' => $s . 'ask_a_venue_added', 'uses' => 'ListYourVenueController@ask_a_venue_added']);


Route::get('/contact-us',         ['as' => $s . 'contact_us',   'uses' => 'ContactUsController@getHome']);
Route::post('/contact-us/added', ['as' => $s . 'added', 'uses' => 'ContactUsController@added']);
Route::get('/blog/',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@index']);
Route::get('/blog/{category}',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@index']);
Route::get('/blog/{category}/{slug}',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@getblog']);

//Route::get('/blog/',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@getdetails']);

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::post('/comments', ['as' => $s . 'comments', 'uses' => 'PagesController@comments']);



Route::get('/get-a-quotes', ['as' => $s . 'cart',   'uses' => 'CartController@index']);
Route::get('/cart/addItem/{id}', ['as' => $s . 'add',   'uses' => 'CartController@addItem']);
Route::get('/cart/remove/{id}', ['as' => $s . 'remove',   'uses' => 'CartController@destroy']);
Route::get('/cart/remove-cart/{id}', ['as' => $s . 'remove-cart',   'uses' => 'CartController@remove_cart_item']);

Route::get('/cart/update/{id}', ['as' => $s . 'update',   'uses' => 'CartController@update']);


//Route::get('/cart/addItem/{id}', 'CartController@addItem');

//Route::get('/cart/remove/{id}', 'CartController@destroy');
//Route::get('/cart/update/{id}', 'CartController@update');

//Route::get('dropzone', 'DropzoneController@index');
//Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');