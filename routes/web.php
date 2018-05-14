<?php

Route::get('/', 'HomeController@getHome')->name('home');

Route::get('about', 'HomeController@getAbout')->name('about');

Route::get('services', 'HomeController@getServices')->name('services');

Route::get('gallery', 'HomeController@getGallery')->name('gallery');

Route::get('gallery/magazin', 'HomeController@getMagazinGallery')->name('magazin');

Route::get('gallery/sklad', 'HomeController@getSkladGallery')->name('sklad');

Route::get('catalog', 'HomeController@getCatalog')->name('catalog');

Route::get('contact-form', 'HomeController@getContactForm')->name('contact-form');

Route::post('contact-form', 'HomeController@postContactForm')->name('contact-form');

Route::get('news', 'HomeController@getNews')->name('news');

Route::get('news/{post}', 'HomeController@getArticle')->name('article');

Route::get('promo', 'HomeController@getPromo')->name('promo');

// Route::get('promo/{action}', 'HomeController@getSinglePromo')->name('promo.single');

Route::get('contact', 'HomeController@getContacts')->name('contact');

Route::get('delivery', 'HomeController@getDelivery')->name('delivery');

Route::get('faq', 'HomeController@getFaq')->name('faq');
// start categories
Route::get('catalog/{category}', 'CategoryController@getCategory')->name('category');
// end categories
// start product
Route::get('catalog/{category}/{product}', 'ProductController@getProduct')->name('product');

// end product
Route::get('cart', 'CartController@getIndex')->name('cart');
//order
Route::get('cart/add/{id}', 'CartController@getAddToCart')->name('cart.add');

Route::post('cart/increase', 'CartAjaxController@getAjaxAddToCart')->name('cart.ajax-increase');
// change qty
Route::get('cart/change-qty', 'CartController@getAddQty')->name('cart.change-qty');

Route::post('cart/add-change-qty', 'CartAjaxController@getAjaxAddQty')->name('cart.ajax-change-qty');

Route::get('cart/reduce/{id}', 'CartController@getReduceByOne')->name('cart.reduce');

Route::post('cart/reduce', 'CartAjaxController@getAjaxReduceByOne')->name('cart.ajax-reduce');

Route::get('cart/remove/{id}', 'CartController@getRemoveItem')->name('cart.remove');

Route::post('cart/remove', 'CartAjaxController@getAjaxRemoveItem')->name('cart.ajax-remove');

Route::get('cart/order', 'CartController@getCheckout')->name('checkout');
//order handler
Route::post('cart/order', 'CartController@postCheckout')->name('checkout');

Route::get('test', function(){
    // $tree = App\Category::get()->keyBy('id')->toArray();

    // $tree = Category::tree($tree);

    $tree = App\Category::where('parent_id', 0)->get();

    return view('test.index', compact('tree'));
});
// form
Route::post('/', 'HomeController@postForm')->name('form');
// form
Route::post('filter', 'ProductController@postAjaxFilter')->name('ajax.filter');
// search
Route::post('search', 'HomeController@postSearch')->name('search');
// login via fb
Route::get('login/facebook', 'SocialController@redirectToFbProvider')->name('fb.login');

Route::get('login/facebook/callback', 'SocialController@handleFbProviderCallback')->name('fb.callback');
// feedback
Route::post('feeedback/create', 'FeedbackController@postCreate')->name('feedback.create');

// CartController
Route::get('add-to-cart', 'CartController@getAddToCartAjax')->name('add.cart');

Route::group(['prefix' => 'manager'], function (){
    Route::group(['middleware' => 'auth'], function (){
        Route::get('/', [
            'uses' => 'AdminController@getDashboard',
            'as' => 'admin.dashboard'
        ]);
        Route::get('logout', [
            'uses' => 'AdminController@getLogout',
            'as' => 'admin.logout'
        ]);
        Route::group(['prefix' => 'page'], function (){
            Route::get('/', [
                'uses' => 'PageController@getIndex',
                'as' => 'page.index'
            ]);
            Route::get('create', [
                'uses' => 'PageController@getCreate',
                'as' => 'page.create'
            ]);
            Route::post('create', [
                'uses' => 'PageController@postCreate',
                'as' => 'page.create'
            ]);
            Route::get('edit/{page}', [
                'uses' => 'PageController@getEdit',
                'as' => 'page.edit'
            ]);
            Route::post('edit/{page}', [
                'uses' => 'PageController@postEdit',
                'as' => 'page.edit'
            ]);
            Route::get('delete/{page}', [
                'uses' => 'PageController@getDelete',
                'as' => 'page.delete'
            ]);
        });
        Route::group(['prefix' => 'post'], function (){
            Route::get('/', [
                'uses' => 'PostController@getIndex',
                'as' => 'post.index'
            ]);
            Route::get('create', [
                'uses' => 'PostController@getCreate',
                'as' => 'post.create'
            ]);
            Route::post('create', [
                'uses' => 'PostController@postCreate',
                'as' => 'post.create'
            ]);
            Route::get('edit/{post}', [
                'uses' => 'PostController@getEdit',
                'as' => 'post.edit'
            ]);
            Route::post('edit/{post}', [
                'uses' => 'PostController@postEdit',
                'as' => 'post.edit'
            ]);
            Route::get('delete/{post}', [
                'uses' => 'PostController@getDelete',
                'as' => 'post.delete'
            ]);
        });
        Route::group(['prefix' => 'category'], function (){
            Route::get('/', [
                'uses' => 'CategoryController@getIndex',
                'as' => 'category.index'
            ]);
            Route::get('create', [
                'uses' => 'CategoryController@getCreate',
                'as' => 'category.create'
            ]);
            Route::post('create', [
                'uses' => 'CategoryController@postCreate',
                'as' => 'category.create'
            ]);
            Route::get('edit/{category}', [
                'uses' => 'CategoryController@getEdit',
                'as' => 'category.edit'
            ]);
            Route::post('edit/{category}', [
                'uses' => 'CategoryController@postEdit',
                'as' => 'category.edit'
            ]);
            Route::get('delete/{category}', [
                'uses' => 'CategoryController@getDelete',
                'as' => 'category.delete'
            ]);
            Route::post('excel', 'CategoryController@excel')->name('category.excel');
        });
        Route::group(['prefix' => 'product'], function (){
            Route::get('/', [
                'uses' => 'ProductController@getIndex',
                'as' => 'product.index'
            ]);
            Route::get('create', [
                'uses' => 'ProductController@getCreate',
                'as' => 'product.create'
            ]);
            Route::post('create', [
                'uses' => 'ProductController@postCreate',
                'as' => 'product.create'
            ]);
            Route::get('edit/{product}', [
                'uses' => 'ProductController@getEdit',
                'as' => 'product.edit'
            ]);
            Route::post('edit/{product}', [
                'uses' => 'ProductController@postEdit',
                'as' => 'product.edit'
            ]);
            Route::get('delete/{product}', [
                'uses' => 'ProductController@getDelete',
                'as' => 'product.delete'
            ]);
            Route::post('excel', 'ProductController@excel')->name('product.excel');
        });
        Route::group(['prefix' => 'slide'], function (){
            Route::get('/', [
                'uses' => 'SlideController@index',
                'as' => 'slide.index'
            ]);
            Route::get('create', [
                'uses' => 'SlideController@create',
                'as' => 'slide.create'
            ]);
            Route::post('create', [
                'uses' => 'SlideController@store',
                'as' => 'slide.create'
            ]);
            Route::get('edit/{slide}', [
                'uses' => 'SlideController@edit',
                'as' => 'slide.edit'
            ]);
            Route::post('edit/{slide}', [
                'uses' => 'SlideController@update',
                'as' => 'slide.edit'
            ]);
            Route::get('delete/{slide}', [
                'uses' => 'SlideController@destroy',
                'as' => 'slide.delete'
            ]);
        });
        Route::group(['prefix' => 'detail'], function (){
            Route::get('/', [
                'uses' => 'DetailController@getIndex',
                'as' => 'detail.index'
            ]);
            Route::get('create', [
                'uses' => 'DetailController@getCreate',
                'as' => 'detail.create'
            ]);
            Route::post('create', [
                'uses' => 'DetailController@postCreate',
                'as' => 'detail.create'
            ]);
            Route::get('edit/{detail}', [
                'uses' => 'DetailController@getEdit',
                'as' => 'detail.edit'
            ]);
            Route::post('edit/{detail}', [
                'uses' => 'DetailController@postEdit',
                'as' => 'detail.edit'
            ]);
            Route::get('delete/{detail}', [
                'uses' => 'DetailController@getDelete',
                'as' => 'detail.delete'
            ]);
        });
        Route::group(['prefix' => 'feedback'], function (){
            Route::get('/', [
                'uses' => 'FeedbackController@index',
                'as' => 'feedback.index'
            ]);
            Route::get('edit/{feedback}', [
                'uses' => 'FeedbackController@edit',
                'as' => 'feedback.edit'
            ]);
            Route::post('edit/{feedback}', [
                'uses' => 'FeedbackController@update',
                'as' => 'feedback.edit'
            ]);
            Route::get('delete/{feedback}', [
                'uses' => 'FeedbackController@destroy',
                'as' => 'feedback.delete'
            ]);
        });
        Route::group(['prefix' => 'order'], function (){
            Route::get('/', [
                'uses' => 'OrderController@index',
                'as' => 'order.index'
            ]);
            Route::get('edit/{order}', [
                'uses' => 'OrderController@edit',
                'as' => 'order.edit'
            ]);
            Route::post('edit/{order}', [
                'uses' => 'OrderController@update',
                'as' => 'order.edit'
            ]);
            Route::get('delete/{order}', [
                'uses' => 'OrderController@destroy',
                'as' => 'order.delete'
            ]);
        });
        Route::group(['prefix' => 'promo'], function (){
            Route::get('/', 'PromoController@index')->name('promo.index');
            Route::get('create', 'PromoController@create')->name('promo.create');
            Route::post('create', 'PromoController@store')->name('promo.create');
            Route::get('edit/{action}', 'PromoController@edit')->name('promo.edit');
            Route::post('edit/{action}', 'PromoController@update')->name('promo.edit');
            Route::get('delete/{action}', 'PromoController@destroy')->name('promo.delete');
        });
    });
    Route::group(['middleware' => 'guest'], function (){
        Route::get('login', [
            'uses' => 'AdminController@getLogin',
            'as' => 'login'
        ]);
        Route::post('login', [
            'uses' => 'AdminController@postLogin',
            'as' => 'admin.login'
        ]);
    });
});
