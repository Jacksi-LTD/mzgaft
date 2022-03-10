<?php

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
