<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AudioController extends Controller
{
    public function index()
    {

        $type = request()->type;

        $people = Person::where('type', 'audios')->get();

        $categories = Category::where('type', 'audios')->get();

        return view('frontend.audios.index', compact('type', 'categories', 'people'));
    }

    public function category(Category $category)
    {
        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('category_id', $category->id)->paginate();

        $some_audios = Audio::with(['writer', 'category', 'created_by', 'media'])->get();

        return view('frontend.audios.category', compact('audios', 'some_audios', 'category'));
    }

    public function people($person_id)
    {
        $person = Person::findOrFail($person_id);

        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('writer_id', $person->id)->paginate();

        $some_audios = Audio::with(['writer', 'category', 'created_by', 'media'])->get();

        $category = Category::where('type', 'audios')->first();

        return view('frontend.audios.person', compact('audios', 'some_audios', 'category', 'person'));
    }

    public function show(Audio $audio)
    {
        $audio->load('writer', 'category', 'created_by');
        return view('frontend.audios.show', compact('audio'));
    }

    public function single(Media $media){

        return view('frontend.audios.single', compact('media'));
    }
}
