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
        $categories = Category::where(['type'=> 'audio_books','category_id'=>null])->get();
        // $categories = Category::where('type', 'audio_books')->get();

        return view('frontend.audioBooks.index', compact('categories'));
    }

    public function category(Category $category)
    {
        $audioBooks = AudioBook::with(['writer', 'category', 'created_by', 'media'])->paginate();

        $some_audio_books = AudioBook::with(['writer', 'category', 'created_by', 'media'])->get();

        return view('frontend.audioBooks.category', compact('audioBooks','category', 'some_audio_books'));
    }


    public function show(AudioBook $audioBook)
    {
        // $audioBookIn = $audioBook;
        if(isset($audioBook->visits)){
            AudioBook::find($audioBook->id)->increment('visits');
        }else{
            $audioBook->visits = 1;
            $audioBook->save();
        }

        $audioBook->load('writer', 'category', 'created_by', 'media.model');

        return view('frontend.audioBooks.show', compact('audioBook'));
    }
}
