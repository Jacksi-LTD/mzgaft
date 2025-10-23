<?php
/*
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController', ['except' => ['destroy']]);

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController', ['except' => ['destroy']]);

    // Person
    Route::apiResource('people', 'PersonApiController');

    // Blog
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Audio
    Route::post('audios/media', 'AudioApiController@storeMedia')->name('audios.storeMedia');
    Route::apiResource('audios', 'AudioApiController');

    // Book
    Route::post('books/media', 'BookApiController@storeMedia')->name('books.storeMedia');
    Route::apiResource('books', 'BookApiController');

    // Audio Book
    Route::post('audio-books/media', 'AudioBookApiController@storeMedia')->name('audio-books.storeMedia');
    Route::apiResource('audio-books', 'AudioBookApiController');

    // Surah
    Route::apiResource('surahs', 'SurahApiController');

    // Aya
    Route::post('ayas/media', 'AyaApiController@storeMedia')->name('ayas.storeMedia');
    Route::apiResource('ayas', 'AyaApiController');

    // Question
    Route::post('questions/media', 'QuestionApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionApiController');

    // Page
    Route::apiResource('pages', 'PageApiController');
});
*/


Route::group(['prefix' => 'v2', 'as' => 'api.', 'namespace' => 'Api\V2'], function () {

    //categories/blogs
    Route::get('blog-categories', 'BlogsApiController@categories');
    Route::get('blog-categories/{id}', 'BlogsApiController@by_category');
    Route::apiResource('blogs', 'BlogsApiController');

    Route::get('categories/hadith', 'HadithApiController@categories');
    Route::get('category/{id}/chapters', 'HadithApiController@chapters');
    Route::apiResource('hadith', 'HadithApiController');


    Route::apiResource('suggestions', 'SuggestionsApiController');

    Route::apiResource('donations', 'DonationApiController');


    Route::get('question-categories', 'QuestionsApiController@categories');
    Route::get('question-categories/{id}', 'QuestionsApiController@sub_categories');
    Route::apiResource('questions', 'QuestionsApiController');

    Route::get("book-types", "BooksApiController@categories");
    Route::get('book-types/{id}', 'BooksApiController@by_category');
    Route::apiResource('books', 'BooksApiController');

    Route::get('categories/products', 'ProductsApiController@categories');
    Route::apiResource('products', 'ProductsApiController');

    Route::apiResource('pages', 'PagesApiController');


    Route::get('audio/teachers', 'AudioApiController@acoustics_teachers');
    Route::get('categories/audios', 'AudioApiController@categories');
    Route::apiResource('audios', 'AudioApiController');


    ///cahpters/audiobooks
    Route::get('cahpters/audiobooks', 'AudioBooksApiController@categories');
    Route::apiResource('audio/books', 'AudioBooksApiController');


    Route::apiResource('orders', 'OrdersApiController');


    Route::apiResource('prayer', 'PrayerApiController');
    Route::apiResource('tajweed', 'TajweedApiController');


    Route::apiResource('contact_us', 'Contact_usApiController');



    Route::get('categories/youtube_videos', 'YoutubeApiController@categories');
    Route::apiResource('audio/youtube', 'YoutubeApiController');



    Route::apiResource('advice', 'AdviceApiController');
    Route::apiResource('attentions', 'AttentaionsApiController');

    Route::get("asma-allah-alhusna", "GodNamesApiController@index");

    Route::get("azkar-categories", "RemembranceApiController@categories");
    Route::get("azkar-categories/{id}", "RemembranceApiController@showCategories");

    Route::get("azkars", "RemembranceApiController@azkars");
    Route::get("azkars/{id}", "RemembranceApiController@showAzkars");

    Route::get('dua-categories', "DuaApiController@categories");
    Route::get('dua-categories/{id}', "DuaApiController@showCategories");
    Route::get("duas", "DuaApiController@index");
    Route::get("duas/{id}", "DuaApiController@show");

    Route::get('muslim-fortress-categories', "MuslimFortressApiController@categories");
    Route::get('muslim-fortress-categories/{id}', "MuslimFortressApiController@showCategories");
    // Muslim Fortress API routes
    Route::get('muslim-fortresses', "MuslimFortressApiController@index");
    Route::get('muslim-fortresses/{id}', "MuslimFortressApiController@show");

});
