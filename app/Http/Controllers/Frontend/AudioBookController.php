<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AudioBookController extends Controller
{
    public function index()
    {

        $audioBooks = AudioBook::with(['writer', 'category', 'created_by', 'media'])->get();

        $people = Person::get();

        $categories = Category::get();

        $users = User::get();

        return view('frontend.audioBooks.index', compact('audioBooks', 'categories', 'people', 'users'));
    }


    public function show(AudioBook $audioBook)
    {

        $audioBook->load('writer', 'category', 'created_by');

        return view('frontend.audioBooks.show', compact('audioBook'));
    }
}
