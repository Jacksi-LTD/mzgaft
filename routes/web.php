<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::resource('roles', 'RolesController', ['except' => ['destroy']]);

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Categories
    Route::post('categories/parse-csv-import', 'CategoriesController@parseCsvImport')->name('categories.parseCsvImport');
    Route::post('categories/process-csv-import', 'CategoriesController@processCsvImport')->name('categories.processCsvImport');
    Route::resource('categories', 'CategoriesController', ['except' => ['destroy']]);

    // Person
    Route::delete('people/destroy', 'PersonController@massDestroy')->name('people.massDestroy');
    Route::post('people/parse-csv-import', 'PersonController@parseCsvImport')->name('people.parseCsvImport');
    Route::post('people/process-csv-import', 'PersonController@processCsvImport')->name('people.processCsvImport');
    Route::resource('people', 'PersonController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::post('blogs/parse-csv-import', 'BlogController@parseCsvImport')->name('blogs.parseCsvImport');
    Route::post('blogs/process-csv-import', 'BlogController@processCsvImport')->name('blogs.processCsvImport');
    Route::resource('blogs', 'BlogController');

    // Audio
    Route::delete('audios/destroy', 'AudioController@massDestroy')->name('audios.massDestroy');
    Route::post('audios/media', 'AudioController@storeMedia')->name('audios.storeMedia');
    Route::post('audios/ckmedia', 'AudioController@storeCKEditorImages')->name('audios.storeCKEditorImages');
    Route::post('audios/parse-csv-import', 'AudioController@parseCsvImport')->name('audios.parseCsvImport');
    Route::post('audios/process-csv-import', 'AudioController@processCsvImport')->name('audios.processCsvImport');
    Route::resource('audios', 'AudioController');

    // Book
    Route::delete('books/destroy', 'BookController@massDestroy')->name('books.massDestroy');
    Route::post('books/media', 'BookController@storeMedia')->name('books.storeMedia');
    Route::post('books/ckmedia', 'BookController@storeCKEditorImages')->name('books.storeCKEditorImages');
    Route::post('books/parse-csv-import', 'BookController@parseCsvImport')->name('books.parseCsvImport');
    Route::post('books/process-csv-import', 'BookController@processCsvImport')->name('books.processCsvImport');
    Route::resource('books', 'BookController');

    // Audio Book
    Route::delete('audio-books/destroy', 'AudioBookController@massDestroy')->name('audio-books.massDestroy');
    Route::post('audio-books/media', 'AudioBookController@storeMedia')->name('audio-books.storeMedia');
    Route::post('audio-books/ckmedia', 'AudioBookController@storeCKEditorImages')->name('audio-books.storeCKEditorImages');
    Route::post('audio-books/parse-csv-import', 'AudioBookController@parseCsvImport')->name('audio-books.parseCsvImport');
    Route::post('audio-books/process-csv-import', 'AudioBookController@processCsvImport')->name('audio-books.processCsvImport');
    Route::resource('audio-books', 'AudioBookController');

    // Surah
    Route::delete('surahs/destroy', 'SurahController@massDestroy')->name('surahs.massDestroy');
    Route::post('surahs/parse-csv-import', 'SurahController@parseCsvImport')->name('surahs.parseCsvImport');
    Route::post('surahs/process-csv-import', 'SurahController@processCsvImport')->name('surahs.processCsvImport');
    Route::resource('surahs', 'SurahController');

    // Aya
    Route::delete('ayas/destroy', 'AyaController@massDestroy')->name('ayas.massDestroy');
    Route::post('ayas/media', 'AyaController@storeMedia')->name('ayas.storeMedia');
    Route::post('ayas/ckmedia', 'AyaController@storeCKEditorImages')->name('ayas.storeCKEditorImages');
    Route::post('ayas/parse-csv-import', 'AyaController@parseCsvImport')->name('ayas.parseCsvImport');
    Route::post('ayas/process-csv-import', 'AyaController@processCsvImport')->name('ayas.processCsvImport');
    Route::resource('ayas', 'AyaController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::post('questions/parse-csv-import', 'QuestionController@parseCsvImport')->name('questions.parseCsvImport');
    Route::post('questions/process-csv-import', 'QuestionController@processCsvImport')->name('questions.processCsvImport');
    Route::resource('questions', 'QuestionController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/parse-csv-import', 'PageController@parseCsvImport')->name('pages.parseCsvImport');
    Route::post('pages/process-csv-import', 'PageController@processCsvImport')->name('pages.processCsvImport');
    Route::resource('pages', 'PageController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
// Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::resource('roles', 'RolesController', ['except' => ['destroy']]);

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::resource('categories', 'CategoriesController', ['except' => ['destroy']]);

    // Person
    Route::delete('people/destroy', 'PersonController@massDestroy')->name('people.massDestroy');
    Route::resource('people', 'PersonController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::get('blogs/category/{category}', 'BlogController@category')->name('blogs.category');
    Route::resource('blogs', 'BlogController');

    // Audio
    Route::delete('audios/destroy', 'AudioController@massDestroy')->name('audios.massDestroy');
    Route::post('audios/media', 'AudioController@storeMedia')->name('audios.storeMedia');
    Route::post('audios/ckmedia', 'AudioController@storeCKEditorImages')->name('audios.storeCKEditorImages');
    Route::resource('audios', 'AudioController');

    // Book
    Route::delete('books/destroy', 'BookController@massDestroy')->name('books.massDestroy');
    Route::post('books/media', 'BookController@storeMedia')->name('books.storeMedia');
    Route::post('books/ckmedia', 'BookController@storeCKEditorImages')->name('books.storeCKEditorImages');
    Route::resource('books', 'BookController');

    // Audio Book
    Route::delete('audio-books/destroy', 'AudioBookController@massDestroy')->name('audio-books.massDestroy');
    Route::post('audio-books/media', 'AudioBookController@storeMedia')->name('audio-books.storeMedia');
    Route::post('audio-books/ckmedia', 'AudioBookController@storeCKEditorImages')->name('audio-books.storeCKEditorImages');
    Route::resource('audio-books', 'AudioBookController');

    // TODO: Tafsir
    Route::resource('tafsir', 'TafsirController');
    // Surah
    Route::delete('surahs/destroy', 'SurahController@massDestroy')->name('surahs.massDestroy');
    Route::resource('surahs', 'SurahController');

    // Aya
    Route::delete('ayas/destroy', 'AyaController@massDestroy')->name('ayas.massDestroy');
    Route::post('ayas/media', 'AyaController@storeMedia')->name('ayas.storeMedia');
    Route::post('ayas/ckmedia', 'AyaController@storeCKEditorImages')->name('ayas.storeCKEditorImages');
    Route::resource('ayas', 'AyaController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::resource('pages', 'PageController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
