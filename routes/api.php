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
    Route::get('categories/blogs', 'BlogsApiController@categories');
    Route::get('blogs/category/{id}', 'BlogsApiController@by_category');
    Route::apiResource('blogs', 'BlogsApiController');

    Route::get('categories/hadith', 'HadithApiController@categories');
    Route::get('category/{id}/chapters', 'HadithApiController@chapters');
    Route::apiResource('hadith', 'HadithApiController');


    Route::apiResource('suggestions', 'SuggestionsApiController');

    Route::apiResource('donations', 'DonationApiController');


    Route::get('categories/questions', 'QuestionsApiController@categories');
    Route::get('sub_categories/{id}/questions', 'QuestionsApiController@sub_categories');
    Route::apiResource('questions', 'QuestionsApiController');

    Route::apiResource('books', 'BooksApiController');
    Route::apiResource('pages', 'PagesApiController');


    Route::get('acoustics_teachers', 'AudioApiController@acoustics_teachers');
    Route::get('categories/audios', 'AudioApiController@categories');
    Route::apiResource('audios', 'AudioApiController');


    ///cahpters/audiobooks
    Route::get('cahpters/audiobooks', 'AudioBooksApiController@categories');
    Route::apiResource('audiobooks', 'AudioBooksApiController');



    Route::get('categories/youtube_videos', 'YoutubeApiController@categories');
    Route::apiResource('youtube_videos', 'YoutubeApiController');

    Route::apiResource('advice', 'AdviceApiController');
    Route::apiResource('attentions', 'AttentaionsApiController');
});
