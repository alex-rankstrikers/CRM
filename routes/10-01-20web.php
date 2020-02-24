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
//Route::get('/crm/dashboard', 'DashboardController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function()
{
    $a = 'admin.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'AdminController@index']);	
	
	//Route::get('settings', ['uses' => 'CrmController@settings', 'as' => $a .'settings']);
	/*Route::post('postaddregion_ajax', ['uses' => 'CrmController@postaddregion_ajax', 'as' => $a .'postaddregion_ajax']);
	Route::post('postupdateregion_ajax', ['uses' => 'CrmController@postupdateregion_ajax', 'as' => $a .'postupdateregion_ajax']);
	Route::post('postdeleteregion_ajax', ['uses' => 'CrmController@postdeleteregion_ajax', 'as' => $a .'postdeleteregion_ajax']);
	
	Route::post('postaddlead_ajax', ['uses' => 'CrmController@postaddregion_ajax', 'as' => $a .'postaddregion_ajax']);
	Route::post('postupdatelead_ajax', ['uses' => 'CrmController@postupdateregion_ajax', 'as' => $a .'postupdateregion_ajax']);
	Route::post('postdeletelead_ajax', ['uses' => 'CrmController@postdeleteregion_ajax', 'as' => $a .'postdeleteregion_ajax']);
	*/
	
	
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
	Route::post('users/sales_added', ['as' => $a . 'sales_added', 'uses' => 'AdminController@sales_added']);
	Route::post('users/updated', ['as' => $a . 'updated', 'uses' => 'AdminController@updated']);
	Route::post('users/sales_updated', ['as' => $a . 'sales_updated', 'uses' => 'AdminController@sales_updated']);
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

	Route::post('category/enable', ['as' => $a . 'enable', 'uses' => 'CategoryController@enable']);
	Route::post('category/disable', ['as' => $a . 'deleted', 'uses' => 'CategoryController@disable']);
	
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



	//Admin CLUB BB GUEST Root
	Route::get('/guest', ['as' => $a . 'guest', 'uses' => 'GuestController@index']);
	Route::post('guest/added', ['as' => $a . 'added', 'uses' => 'GuestController@added']);
	Route::post('guest/updated', ['as' => $a . 'updated', 'uses' => 'GuestController@updated']);
	Route::post('guest/deleted', ['as' => $a . 'deleted', 'uses' => 'GuestController@deleted']);
	Route::post('guest/destroy', ['as' => $a . 'destroy', 'uses' => 'GuestController@destroy']);	
	Route::post('guest/getnews', ['as' => $a . 'getnews', 'uses' => 'GuestController@getGuest']);


	//Admin CLUB BB TRAVEL Root
	Route::get('/travel', ['as' => $a . 'news', 'uses' => 'TravelController@index']);
	Route::post('travel/added', ['as' => $a . 'added', 'uses' => 'TravelController@added']);
	Route::post('travel/updated', ['as' => $a . 'updated', 'uses' => 'TravelController@updated']);
	Route::post('travel/deleted', ['as' => $a . 'deleted', 'uses' => 'TravelController@deleted']);
	Route::post('travel/destroy', ['as' => $a . 'destroy', 'uses' => 'TravelController@destroy']);	
	Route::post('travel/getnews', ['as' => $a . 'getnews', 'uses' => 'TravelController@getnews']);


	//Admin PARTNERSHIP  Root
	Route::get('/partnership', ['as' => $a . 'partnership', 'uses' => 'PartnershipController@index']);
	Route::post('partnership/added', ['as' => $a . 'added', 'uses' => 'PartnershipController@added']);
	Route::post('partnership/updated', ['as' => $a . 'updated', 'uses' => 'PartnershipController@updated']);
	Route::post('partnership/deleted', ['as' => $a . 'deleted', 'uses' => 'PartnershipController@deleted']);
	Route::post('partnership/destroy', ['as' => $a . 'destroy', 'uses' => 'PartnershipController@destroy']);	
	Route::post('partnership/getnews', ['as' => $a . 'getnews', 'uses' => 'PartnershipController@getPartnership']);


	//Admin PARTNERS LOGO  Root
	Route::get('/partners', ['as' => $a . 'partners', 'uses' => 'PartnersController@index']);
	Route::post('partners/added', ['as' => $a . 'added', 'uses' => 'PartnersController@added']);
	Route::post('partners/updated', ['as' => $a . 'updated', 'uses' => 'PartnersController@updated']);
	Route::post('partners/deleted', ['as' => $a . 'deleted', 'uses' => 'PartnersController@deleted']);
	Route::post('partners/destroy', ['as' => $a . 'destroy', 'uses' => 'PartnersController@destroy']);	
	Route::post('partners/getnews', ['as' => $a . 'getnews', 'uses' => 'PartnersController@getPartners']);


	//Admin CLIENT SHOUT OUTS  Root
	Route::get('/client-shout-outs', ['as' => $a . 'client-shout-outs', 'uses' => 'ClientshoutoutsController@index']);
	Route::post('client-shout-outs/added', ['as' => $a . 'added', 'uses' => 'ClientshoutoutsController@added']);
	Route::post('client-shout-outs/updated', ['as' => $a . 'updated', 'uses' => 'ClientshoutoutsController@updated']);
	Route::post('client-shout-outs/deleted', ['as' => $a . 'deleted', 'uses' => 'ClientshoutoutsController@deleted']);
	Route::post('client-shout-outs/destroy', ['as' => $a . 'destroy', 'uses' => 'ClientshoutoutsController@destroy']);	
	Route::post('client-shout-outs/getnews', ['as' => $a . 'getnews', 'uses' => 'ClientshoutoutsController@getClientshoutouts']);
	
	// Add Hotel

	Route::post('hotels/enable', ['as' => $a . 'enable', 'uses' => 'HotelsController@enable']);
	Route::post('hotels/disable', ['as' => $a . 'deleted', 'uses' => 'HotelsController@disable']);

	Route::get('/edit-hotel/{id}', ['as' => $a . 'edit-hotel', 'uses' => 'CrmController@editHotel']);
	Route::get('/add-hotel', ['as' => $a . 'add-hotel', 'uses' => 'HotelsController@addHotel']);
	Route::post('/hotel/added', ['as' => $a . 'added', 'uses' => 'HotelsController@added']);	
	Route::get('/hotels', ['as' => $a . 'hotels', 'uses' => 'HotelsController@editHotel']);
	Route::post('/hotels/updated', ['as' => $a . 'updated', 'uses' => 'HotelsController@updated']);
	Route::post('/gethotel', ['as' => $a . 'get-hotel', 'uses' => 'HotelsController@getHotel']);

	Route::post('/getstates', ['as' => $a . 'getstates', 'uses' => 'HotelsController@getstates']);
	Route::post('/getcities', ['as' => $a . 'getcities', 'uses' => 'HotelsController@getcities']);

	Route::get('/add-room/{id}', ['as' => $a . 'add-room', 'uses' => 'HotelsController@addRoom']);
	Route::post('/add-room/{id}/added', ['as' => $a . 'added', 'uses' => 'HotelsController@addedRoom']);	
	Route::get('/view-rooms/{id}', ['as' => $a . 'view-rooms', 'uses' => 'HotelsController@ViewRooms']);
	Route::post('rooms/{id}/updated', ['as' => $a . 'updated', 'uses' => 'HotelsController@updatedRoom']);
	Route::post('/getroom', ['as' => $a . 'get-room', 'uses' => 'HotelsController@getRoom']);
	Route::post('/update-offer', ['as' => $a . 'update-offer', 'uses' => 'HotelsController@updateOffer']);
	

	Route::post('/dropzone/uploadFiles', ['as' => $a . 'uploadFiles', 'uses' => 'DropzoneController@uploadFiles']);


	
// 	//Admin Merchants Venue Root
// 	Route::get('merchants/hotels', ['as' => $a . 'venue', 'uses' => 'VenueController@index']);
// 	Route::post('merchants/hotels/added', ['as' => $a . 'added', 'uses' => 'VenueController@added']);
// 	Route::post('merchants/hotels/updated', ['as' => $a . 'updated', 'uses' => 'VenueController@updated']);
// 	Route::post('merchants/hotels/deleted', ['as' => $a . 'deleted', 'uses' => 'VenueController@deleted']);
// 	Route::post('merchants/hotels/remove', ['as' => $a . 'remove', 'uses' => 'VenueController@remove']);
// 	Route::post('merchants/hotels/destroy', ['as' => $a . 'destroy', 'uses' => 'VenueController@destroy']);
// 	Route::post('merchants/hotels/enable', ['as' => $a . 'enable', 'uses' => 'VenueController@enable']);
// 	Route::post('merchants/hotels/disable', ['as' => $a . 'deleted', 'uses' => 'VenueController@disable']);
// 	Route::post('merchants/hotels/getvenue', ['as' => $a . 'getvenue', 'uses' => 'VenueController@getvenue']);
// //	Route::post('merchants/hotels/getsubcategory', ['as' => $a . 'getsubcategory', 'uses' => 'VenueController@getsubcategory']);
// 	Route::post('merchants/hotels/getstates', ['as' => $a . 'getstates', 'uses' => 'VenueController@getstates']);
// 	Route::post('merchants/hotels/getcities', ['as' => $a . 'getcities', 'uses' => 'VenueController@getcities']);
	
	
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

// Route::group(['prefix' => 'crm', 'middleware' => 'auth:crm'], function()
// {
//     $a = 'crm.';
//     Route::get('/', ['as' => $a . 'home', 'uses' => 'CrmController@getHome']);

//     Route::group(['middleware' => 'activated'], function ()
//     {
//         $m = 'activated.';
//         Route::get('protected', ['as' => $m . 'protected', 'uses' => 'CrmController@getProtected']);
//     });

// });


Route::group(['prefix' => 'hotelier', 'middleware' => 'auth:crm'], function()
{
    $a = 'hotelier.';
	Route::get('/portal-add', ['as' => $a . 'portal-add', 'uses' => 'HotelierController@portalAdd']);
	Route::get('/hotel-portal', ['as' => $a . 'hotel-portal', 'uses' => 'HotelierController@viewHotels']);
	Route::get('/hotel-configuration/{id}', ['as' => $a . 'hotel-configuration', 'uses' => 'HotelierController@addHotelConfiguration']);
	Route::get('/hotel-configuration', ['as' => $a . 'hotel-configuration', 'uses' => 'HotelierController@addHotelConfiguration']);
	Route::get('/strategic-documentation', ['as' => $a . 'strategic-documentation', 'uses' => 'StrategicDocumentationController@addStrategicDocumentation']);
	Route::get('/events', ['as' => $a . 'events', 'uses' => 'HotelierController@events']);
	Route::post('/eventsUpdated', ['as' => $a . 'eventsUpdated', 'uses' => 'HotelierController@eventsUpdated']);
	Route::post('/hotel/added', ['as' => $a . 'added', 'uses' => 'HotelierController@added']);
	Route::post('/hotel/add-room', ['as' => $a . 'add-room', 'uses' => 'HotelierController@addRoom']);
	Route::post('/hotel/update-room', ['as' => $a . 'update-room', 'uses' => 'HotelierController@updateRoom']);
	Route::post('/hotel/add-tax', ['as' => $a . 'add-tax', 'uses' => 'HotelierController@addTax']);
	Route::post('/hotel/update-tax', ['as' => $a . 'update-tax', 'uses' => 'HotelierController@updateTax']);
	Route::get('/sales-activity', ['as' => $a . 'sales-activity', 'uses' => 'CrmController@index']);
	Route::post('/getcharts', ['as' => $a . 'getcharts', 'uses' => 'CrmController@getcharts']);
	Route::post('/exportcharts/{type}', 'CrmController@exportcharts');
	Route::post('/hotel/add-restaurant', ['as' => $a . 'add-restaurant', 'uses' => 'HotelierController@addRestaurant']);
	Route::post('/hotel/update-restaurant', ['as' => $a . 'update-restaurant', 'uses' => 'HotelierController@updateRestaurant']);
	Route::post('/hotel/add-bar', ['as' => $a . 'add-bar', 'uses' => 'HotelierController@addBar']);
	Route::post('/hotel/update-bar', ['as' => $a . 'update-bar', 'uses' => 'HotelierController@updateBar']);
	Route::post('/hotel/add-synxis', ['as' => $a . 'add-synxis', 'uses' => 'HotelierController@addSynXis']);
	Route::post('/import-synxis', ['as' => $a . 'import-synxis', 'uses' => 'HotelierController@importSynXis']);
	Route::post('/import-hotel-configuration', ['as' => $a . 'import-hotel-configuration', 'uses' => 'HotelierController@importHotelConfiguration']);
	Route::post('/import-property-info', ['as' => $a . 'import-property-info', 'uses' => 'HotelierController@importPropertyInfo']);
	Route::post('/import-room-configuration', ['as' => $a . 'import-room-configuration', 'uses' => 'HotelierController@importRoomConfiguration']);
	Route::post('/import-tax-configuration', ['as' => $a . 'import-tax-configuration', 'uses' => 'HotelierController@importTaxConfiguration']);
	Route::post('/import-meeting-events-facilities', ['as' => $a . 'import-meeting-events-facilities', 'uses' => 'HotelierController@importMeetingEventsFacilities']);	
		
	Route::get('/hotels', ['as' => $a . 'hotels', 'uses' => 'HotelierController@editHotel']);
	Route::get('/create', ['as' => $a . 'create', 'uses' => 'HotelierController@create']);
	Route::post('/store', ['as' => $a . 'store', 'uses' => 'HotelierController@store']);
	Route::post('/hotels/updated', ['as' => $a . 'updated', 'uses' => 'HotelierController@updated']);
	Route::post('/gethotel', ['as' => $a . 'get-hotel', 'uses' => 'HotelierController@getHotel']);
	Route::post('/airportList', ['as' => $a . 'airportList', 'uses' => 'HotelierController@airportList']);
	Route::post('/zoneOffset', ['as' => $a . 'zoneOffset', 'uses' => 'HotelierController@zoneOffset']);
	//Route::get('downloadExcel/{type}/{id}', 'HotelierController@downloadExcel')->name('export.file');
	Route::get('/export-hotel-info/{type}/{id}', 'HotelierController@downloadHotelInformation');
	Route::get('/export-property-info/{type}/{id}', 'HotelierController@downloadPropertyInformation');
	Route::get('/export-tax-config/{type}/{id}', 'HotelierController@downloadTaxConfiguration');
	Route::get('/export-room-configuration/{type}/{id}', 'HotelierController@downloadRoomConfiguration');
	Route::get('/export-event-details/{type}', 'HotelierController@downloadEventDetails');
	Route::get('/edit-profile', ['as' => $a . 'edit_profile', 'uses' => 'HotelierController@edit_profile']);
	Route::get('/update-password', ['as' => $a . 'update_password', 'uses' => 'HotelierController@update_password']);
	Route::post('/profileupdated', ['as' => $a . 'profileupdated', 'uses' => 'HotelierController@profileupdated']);
	Route::post('/passupdated', ['as' => $a . 'passupdated', 'uses' => 'HotelierController@passupdated']);
	
	Route::get('settings', ['uses' => 'HotelierController@settings', 'as' => $a .'settings']);
	Route::post('/eventsupdate', ['uses' => 'HotelierController@eventsupdate', 'as' => $a .'eventsupdate']);
	Route::get('/completevent/{id}', ['uses' => 'HotelierController@completevent', 'as' => $a .'completevent']);
	Route::get('/deletevent/{id}', ['uses' => 'HotelierController@deletevent', 'as' => $a .'deletevent']);
	Route::get('/autocomplete', ['uses' => 'HotelierController@ajaxcomplete', 'as' => $a .'autocomplete']);

	Route::post('/getstates', ['as' => $a . 'getstates', 'uses' => 'HotelierController@getstates']);
	Route::post('/getcities', ['as' => $a . 'getcities', 'uses' => 'HotelierController@getcities']);

	Route::get('/hotel-events', ['as' => $a . 'hotel-events', 'uses' => 'HotelierController@hotelevents']);
	Route::get('/event-register/{id}', ['as' => $a . 'event-register', 'uses' => 'HotelierController@eventregister']);
	Route::post('/portal-register', ['as' => $a . 'portal-register', 'uses' => 'HotelierController@portalregister']);

	Route::get('images-upload', ['as' => $a . 'images-upload', 'uses' => 'HomeController@imagesUpload']);

	Route::post('images-upload', ['as' => $a . 'images-upload', 'uses' => 'HomeController@imagesUploadPost']);

	Route::post('/addedUser', ['as' => $a . 'addedUser', 'uses' => 'HotelierController@addedUser']);
	Route::post('/emailExist', ['as' => $a . 'emailExist', 'uses' => 'HotelierController@emailExist']);
  Route::post('/getuserdetail', ['as' => $a . 'getuserdetail', 'uses' => 'HotelierController@getuserdetail']);
	Route::post('/userpw-updated', ['as' => $a . 'userpw-updated', 'uses' => 'CrmController@userpw_updated']);

});

Route::group(['prefix' => 'crm', 'middleware' => 'auth:crm'], function()
{
    $a = 'crm.';
    Route::get('/authorize', 'AuthController@gettoken');
    Route::get('/', ['as' => $a . 'home', 'uses' => 'CrmController@getDashboard']);
	Route::get('/home', ['as' => $a . 'home', 'uses' => 'CrmController@getDashboard']);
	//Route::get('/hotel-leads', ['as' => $a . 'home', 'uses' => 'CrmController@getDashboard']);
	Route::get('/sales-activity', ['as' => $a . 'sales-activity', 'uses' => 'CrmController@index']);
	Route::get('/dashboard/authorize', ['as' => $a . 'dashboard', 'uses' => 'CrmController@index']);
	Route::get('/outlook-auth', ['as' => $a . 'outlook-auth', 'uses' => 'AuthController@outlookAuth']);
	//Route::get('/home', ['as' => $a . 'home', 'uses' => 'CrmController@getDashboard']);
	Route::get('/getagentlist', ['as' => $a . 'getagentlist', 'uses' => 'CrmController@getagentlist']);
	//Route::get('/signin', 'AuthController@signin');
	
	Route::get('/mail', 'OutlookController@mail')->name('mail');
	Route::get('/calendar', 'OutlookController@calendar')->name('calendar');
	Route::get('/contacts', 'OutlookController@contacts')->name('contacts');
		// Route::get('/welcome', 'OutlookController@calendar')->name('welcome');
	Route::post('/createevent', ['as' => $a . 'createevent', 'uses' => 'OutlookController@testAddNewEvent']);
	Route::get('/edit-hotel/{id}', ['as' => $a . 'edit-hotel', 'uses' => 'CrmController@editHotel']);
	Route::post('/update-hotel', ['as' => $a . 'update-hotel', 'uses' => 'CrmController@updateHotel']);
	

	Route::get('/edit-taskevent/{id}', ['as' => $a . 'edit-taskevent', 'uses' => 'CrmController@editTaskevent']);

	Route::get('/add-hotel', ['as' => $a . 'add-hotel', 'uses' => 'CrmController@addHotel']);
	Route::get('/events', ['as' => $a . 'events', 'uses' => 'CrmController@events']);
	Route::post('/hotel/added', ['as' => $a . 'added', 'uses' => 'CrmController@added']);	
	Route::post('/userpw-updated', ['as' => $a . 'userpw-updated', 'uses' => 'CrmController@userpw_updated']);	
	Route::get('/hotels', ['as' => $a . 'hotels', 'uses' => 'CrmController@editHotel']);
	Route::get('/create', ['as' => $a . 'create', 'uses' => 'CrmController@create']);
	Route::post('/store', ['as' => $a . 'store', 'uses' => 'CrmController@store']);
	Route::post('/hotels/updated', ['as' => $a . 'updated', 'uses' => 'CrmController@updated']);
	Route::post('/events/updated', ['as' => $a . 'updated', 'uses' => 'CrmController@eventsUpdated']);
	Route::post('/gethotel', ['as' => $a . 'get-hotel', 'uses' => 'CrmController@getHotel']);
	
	Route::get('/edit-profile', ['as' => $a . 'edit_profile', 'uses' => 'CrmController@edit_profile']);
	Route::get('/update-password', ['as' => $a . 'update_password', 'uses' => 'CrmController@update_password']);
	Route::post('/profileupdated', ['as' => $a . 'profileupdated', 'uses' => 'CrmController@profileupdated']);
	Route::post('/passupdated', ['as' => $a . 'passupdated', 'uses' => 'CrmController@passupdated']);
	Route::post('/import-events', ['as' => $a . 'import-events', 'uses' => 'CrmController@importevents']);
	Route::get('/view-users', ['as' => $a . 'view_user', 'uses' => 'CrmController@viewUsers']);
	Route::get('/view-user/{id}', ['as' => $a . 'view_user', 'uses' => 'CrmController@viewUser']);
	Route::get('/edit-user/{id}', ['as' => $a . 'view_user', 'uses' => 'CrmController@editUser']);
	Route::get('/add-user', ['as' => $a . 'create-user-settings', 'uses' => 'CrmController@addUser']);
	Route::post('/added-user', ['as' => $a . 'create-user-settings', 'uses' => 'CrmController@addedUser']);
	Route::post('/update-user', ['as' => $a . 'update-user', 'uses' => 'CrmController@Userupdated']);

	Route::get('settings', ['uses' => 'CrmController@settings', 'as' => $a .'settings']);
	Route::get('add-corporate', ['uses' => 'CrmController@addBusiness', 'as' => $a .'add-corporate']);
	Route::get('edit-corporate/{id}', ['uses' => 'CrmController@editBusiness', 'as' => $a .'edit-corporate']);
	Route::post('/corporate-updated/{id}', ['as' => $a . 'corporate-updated', 'uses' => 'CrmController@corporateUpdated']);	
	Route::get('view-corporate', ['uses' => 'CrmController@viewcorporate', 'as' => $a .'view-corporate']);
	Route::get('add-events', ['uses' => 'CrmController@addevents', 'as' => $a .'add-events']);

	Route::get('add-agent', ['uses' => 'CrmController@addagent', 'as' => $a .'add-agent']);
	Route::get('view-agent', ['uses' => 'CrmController@viewagent', 'as' => $a .'view-agent']);
	Route::get('edit-agent/{id}', ['uses' => 'CrmController@editAgent', 'as' => $a .'edit-agent']);
	Route::post('/agent-updated/{id}', ['as' => $a . 'agent-updated', 'uses' => 'CrmController@agentUpdated']);

	Route::post('/getAgents', ['as' => $a . 'getAgents', 'uses' => 'CrmController@getAgents']);
	Route::post('/update-corp-contact/{id}', ['as' => $a . 'update-corp-contact', 'uses' => 'CrmController@updateCorpContact']);
  Route::post('/getImplant', ['as' => $a . 'getImplant', 'uses' => 'CrmController@getImplant']);
	Route::post('/update-agent-contact/{id}', ['as' => $a . 'update-agent-contact', 'uses' => 'CrmController@updateAgentContact']);
	Route::post('/update-implant-contact/{id}', ['as' => $a . 'update-implant-contact', 'uses' => 'CrmController@updateImplantContact']);
	Route::post('/eventsadded', ['as' => $a . 'eventsadded', 'uses' => 'CrmController@eventsadded']);
	Route::get('view-events', ['uses' => 'CrmController@viewevents', 'as' => $a .'view-events']);
	Route::get('edit-events/{id}', ['uses' => 'CrmController@editEvents', 'as' => $a .'edit-events']);
	Route::get('view-register/{id}', ['uses' => 'CrmController@viewregister', 'as' => $a .'view-register']);
	Route::post('/eventsedited', ['as' => $a . 'eventsedited', 'uses' => 'CrmController@eventsedited']);
	Route::get('/export-event-details/{type}', 'CrmController@downloadEventDetails');	
	Route::post('/view-events/update-payment', ['uses' => 'CrmController@updatepayment', 'as' => $a .'update-payment']);
	Route::post('/getcharts', ['as' => $a . 'getcharts', 'uses' => 'CrmController@getcharts']);

	Route::get('/exportcharts/{type}', 'CrmController@exportcharts');
	Route::post('/exportcharts/{type}', 'CrmController@exportcharts');
	Route::post('/eventsupdate', ['uses' => 'CrmController@eventsupdate', 'as' => $a .'eventsupdate']);
	Route::post('/postviewsajax', ['uses' => 'CrmController@postviewsajax', 'as' => $a .'postviewsajax']);
	Route::get('/completevent/{id}', ['uses' => 'CrmController@completevent', 'as' => $a .'completevent']);
	Route::post('/postusersajax', ['uses' => 'CrmController@postusersajax', 'as' => $a .'postusersajax']);
	Route::post('/postregionalajax', ['uses' => 'CrmController@postregionalajax', 'as' => $a .'postregionalajax']);
	Route::get('/deletevent/{id}', ['uses' => 'CrmController@deletevent', 'as' => $a .'deletevent']);
	Route::get('/autocomplete', ['uses' => 'CrmController@ajaxcomplete', 'as' => $a .'autocomplete']);
	Route::get('/citiesautocomplete', ['uses' => 'CrmController@citiesajaxcomplete', 'as' => $a .'citiesautocomplete']);
	Route::post('/updateConsordiaImplant', ['uses' => 'CrmController@updateConsordiaImplant', 'as' => $a .'updateConsordiaImplant']);
	
	Route::get('/gethdleads', ['uses' => 'CrmController@gethdleads', 'as' => $a .'gethdleads']);
	Route::get('/getheadoffice', ['uses' => 'CrmController@getheadoffice', 'as' => $a .'getheadoffice']);
	
	Route::post('postaddtask_ajax', ['uses' => 'CrmController@postaddtask_ajax', 'as' => $a .'postaddtask_ajax']);
	Route::post('postupdatetask_ajax', ['uses' => 'CrmController@postupdatetask_ajax', 'as' => $a .'postupdatetask_ajax']);
	Route::post('postdeletetask_ajax', ['uses' => 'CrmController@postdeletetask_ajax', 'as' => $a .'postdeletetask_ajax']);


	Route::post('postaddoutcome_ajax', ['uses' => 'CrmController@postaddoutcome_ajax', 'as' => $a .'postaddoutcome_ajax']);
	Route::post('postupdateoutcome_ajax', ['uses' => 'CrmController@postupdateoutcome_ajax', 'as' => $a .'postupdateoutcome_ajax']);
	Route::post('postdeleteoutcome_ajax', ['uses' => 'CrmController@postdeleteoutcome_ajax', 'as' => $a .'postdeleteoutcome_ajax']);

	Route::post('postaddnextstep_ajax', ['uses' => 'CrmController@postaddnextstep_ajax', 'as' => $a .'postaddnextstep_ajax']);
	Route::post('postupdatenextstep_ajax', ['uses' => 'CrmController@postupdatenextstep_ajax', 'as' => $a .'postupdatenextstep_ajax']);
	Route::post('postdeletenextstep_ajax', ['uses' => 'CrmController@postdeletenextstep_ajax', 'as' => $a .'postdeletenextstep_ajax']);
	
	Route::post('postaddactfor_ajax', ['uses' => 'CrmController@postaddactfor_ajax', 'as' => $a .'postaddactfor_ajax']);
	Route::post('postupdateActfor_ajax', ['uses' => 'CrmController@postupdateActfor_ajax', 'as' => $a .'postupdateActfor_ajax']);
	Route::post('postdeleteActfor_ajax', ['uses' => 'CrmController@postdeleteActfor_ajax', 'as' => $a .'postdeleteActfor_ajax']);

	Route::post('postaddregion_ajax', ['uses' => 'CrmController@postaddregion_ajax', 'as' => $a .'postaddregion_ajax']);
	Route::post('postupdateregion_ajax', ['uses' => 'CrmController@postupdateregion_ajax', 'as' => $a .'postupdateregion_ajax']);
	Route::post('postdeleteregion_ajax', ['uses' => 'CrmController@postdeleteregion_ajax', 'as' => $a .'postdeleteregion_ajax']);
	Route::post('postaddlead_ajax', ['uses' => 'CrmController@postaddlead_ajax', 'as' => $a .'postaddlead_ajax']);
	Route::post('postupdatelead_ajax', ['uses' => 'CrmController@postupdatelead_ajax', 'as' => $a .'postupdatelead_ajax']);
	Route::post('postdeletelead_ajax', ['uses' => 'CrmController@postdeletelead_ajax', 'as' => $a .'postdeletelead_ajax']);
	Route::post('/getnextstep', ['as' => $a . 'getnextstep', 'uses' => 'CrmController@getnextstep']);
	Route::post('/getoutcomes', ['as' => $a . 'getoutcomes', 'uses' => 'CrmController@getoutcomes']);
	Route::post('/getcontacts', ['as' => $a . 'getcontacts', 'uses' => 'CrmController@getcontacts']);

	Route::post('/getCorp', ['as' => $a . 'getCorp', 'uses' => 'CrmController@getCorp']);
	Route::post('/getagent_loc', ['as' => $a . 'getagent_loc', 'uses' => 'CrmController@getagent_loc']);
	Route::post('/getcorporate_loc', ['as' => $a . 'getcorporate_loc', 'uses' => 'CrmController@getcorporate_loc']);
	Route::post('/getac_mail', ['as' => $a . 'getac_mail', 'uses' => 'CrmController@getac_mail']);
	Route::post('/remove_guest', ['as' => $a . 'remove_guest', 'uses' => 'CrmController@remove_guest']);
	Route::post('/remove_ocns', ['as' => $a . 'remove_ocns', 'uses' => 'CrmController@remove_ocns']);
	Route::post('/view-events/registered_hotel', ['as' => $a . 'registered_hotel', 'uses' => 'CrmController@registered_hotel']);

	Route::post('/getuserdetail', ['as' => $a . 'getuserdetail', 'uses' => 'CrmController@getuserdetail']);
	Route::post('/getguests', ['as' => $a . 'getguests', 'uses' => 'CrmController@getguests']);
	Route::post('/getstates', ['as' => $a . 'getstates', 'uses' => 'CrmController@getstates']);
	Route::post('/getcities', ['as' => $a . 'getcities', 'uses' => 'CrmController@getcities']);
	Route::post('/getsubsidyAddress', ['as' => $a . 'getsubsidyAddress', 'uses' => 'CrmController@getsubsidyAddress']);
	Route::post('/corporateadded', ['as' => $a . 'corporateadded', 'uses' => 'CrmController@corporateadded']);
	Route::post('/corregional_added', ['as' => $a . 'corregional_added', 'uses' => 'CrmController@corregional_added']);
	Route::post('/corregional_updated', ['as' => $a . 'corregional_updated', 'uses' => 'CrmController@corregional_updated']);
	

	Route::post('/corcontact_added', ['as' => $a . 'corcontact_added', 'uses' => 'CrmController@corcontact_added']);
	Route::post('/agentadded', ['as' => $a . 'agentadded', 'uses' => 'CrmController@agentadded']);
	Route::post('/ageregional_added', ['as' => $a . 'ageregional_added', 'uses' => 'CrmController@ageregional_added']);
	Route::post('/agecontact_added', ['as' => $a . 'agecontact_added', 'uses' => 'CrmController@agecontact_added']);

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
Route::get('/find-a-hotel', ['as' => $s . 'find-a-hotel', 'uses' => 'HotelfindController@findHotel']);
Route::get('/find-a-hotel/{slug}', ['as' => $s . 'find-a-hotel', 'uses' => 'HotelfindController@findHotel']);

Route::get('/search', ['as' => $s . 'search', 'uses' => 'HotelfindController@Search']);

Route::get('/hotel/{slug}', ['as' => $s . 'find-a-hotel', 'uses' => 'HotelfindController@viewHotel']);
Route::get('/offers', ['as' => $s . 'offers', 'uses' => 'HotelfindController@Offers']);


Route::get('/about-us',         ['as' => $s . 'about-us',   'uses' => 'PagesController@about_us']);
Route::get('/jobs',         ['as' => $s . 'jobs',   'uses' => 'PagesController@jobs']);
Route::get('/media-press',         ['as' => $s . 'media-press',   'uses' => 'PagesController@media_press']);
Route::get('/how-it-works-users',         ['as' => $s . 'how-it-works-users',   'uses' => 'PagesController@how_it_works']);
Route::get('/how-it-works-venues',         ['as' => $s . 'how-it-works-venues',   'uses' => 'PagesController@how_it_works_venues']);
Route::get('/terms-and-policies',         ['as' => $s . 'terms-and-policies',   'uses' => 'PagesController@terms_and_policies']);

Route::get('/get-all-category',         ['as' => $s . 'getallcategory',   'uses' => 'PagesController@getallcategory']);
Route::get('/faq-users',         ['as' => $s . 'faq-users',   'uses' => 'PagesController@faq']);
Route::get('/faq-venues',         ['as' => $s . 'faq-venues',   'uses' => 'PagesController@faqVenues']);



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



Route::get('/search/{page}/{search}/{location}',         ['as' => $s . 'onload-venues-search',   'uses' => 'ListYourVenueController@Search']);

Route::post('/list-your-venue/added', ['as' => $s . 'added', 'uses' => 'ListYourVenueController@added']);
Route::get('/ask-a-venue-expert', ['as' => $s . 'ask-a-venue-expert', 'uses' => 'ListYourVenueController@ask_a_venue_expert']);
Route::post('/ask-a-venue-added', ['as' => $s . 'ask_a_venue_added', 'uses' => 'ListYourVenueController@ask_a_venue_added']);

Route::get('/search/{page}/{search}/{location}',         ['as' => $s . 'onload-venues-search',   'uses' => 'ListYourVenueController@onload_venues_search']);

Route::get('/contact-us',         ['as' => $s . 'contact_us',   'uses' => 'ContactUsController@getHome']);
Route::post('/contact-us/added', ['as' => $s . 'added', 'uses' => 'ContactUsController@added']);
Route::get('/blog/',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@index']);
Route::get('/blog/{category}',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@index']);
Route::get('/blog/{category}/{slug}',         ['as' => $s . 'blog',   'uses' => 'FrontBlogController@getblog']);

Route::post('/comments', ['as' => $s . 'comments', 'uses' => 'PagesController@comments']);


Route::get('case-study/{slug}', ['as' => $s . 'case-study',   'uses' => 'PagesController@caseStudy']);

Route::get('{slug}', ['as' => $s . 'pages',   'uses' => 'PagesController@DynamicPages']);

//Route::get('/cart/addItem/{id}', 'CartController@addItem');

//Route::get('/cart/remove/{id}', 'CartController@destroy');
//Route::get('/cart/update/{id}', 'CartController@update');

//Route::get('dropzone', 'DropzoneController@index');
//Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');