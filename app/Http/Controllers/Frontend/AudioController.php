<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AudioController extends Controller
{
    public function index()
    {
        $people = Person::where('type', 'audios')->orderBy('created_at', 'DESC')->get();

        // $categories = Category::where('type', 'audios')->orderBy('created_at', 'DESC')->get();
        $categories = Category::where(['type'=> 'audios','category_id'=>null])->orderBy('created_at', 'DESC')->get();

        return view('frontend.audios.index', compact('categories', 'people'));
    }

    public function category(Category $category)
    {
        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('category_id', $category->id)->paginate();

        $some_audios = Audio::with(['writer', 'category', 'created_by', 'media'])->favorite()->orderBy('created_at', 'DESC')->get();

        return view('frontend.audios.category', compact('audios', 'some_audios', 'category'));
    }

    public function people($person_id)
    {
        $person = Person::findOrFail($person_id);

        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('writer_id', $person->id)->paginate();

        $some_audios = Audio::with(['writer', 'category', 'created_by', 'media'])->favorite()->orderBy('created_at', 'DESC')->get();

        $category = Category::where('type', 'audios')->first();

        return view('frontend.audios.person', compact('audios', 'some_audios', 'category', 'person'));
    }

    public function people_json($person_id)
    {
        $person = Person::findOrFail($person_id);

        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('writer_id', $person->id)->withCount('media')->orderBy('created_at', 'DESC')->get();

        return $audios;
    }
    public function media_json(Audio $audio)
    {
        //Audio::find($audio->id)->increment('visits');
        //$audio->load('writer', 'category', 'created_by');
        $files = $audio->files;
        $files->map(function ($item) {
            $audio_info = new \wapmorgan\Mp3Info\Mp3Info($item->getPath(), true);
            $audio_info->duration;// \\ duration in seconds
            $item['duration'] = gmdate("H:i:s", $audio_info->duration);
            return $item;
        });
        // dd($files);
        return collect($files);
    }

    public function show(Audio $audio)
    {
        if (isset($audio->visits)) {
            Audio::find($audio->id)->increment('visits');
        } else {
            $audio->visits = 1;
            $audio->save();
        }
        $audio->load('writer', 'category', 'created_by', 'media.model');//->with('media.model')
        return view('frontend.audios.show', compact('audio'));
    }

    public function single(Media $media)
    {
        if (isset(request()->audio)) {
            $audio = Audio::find(request()->audio);
        } else {
            $audio = AudioBook::find(request()->audioBook);
        }
        return view('frontend.audios.single', compact('media', 'audio'));
    }
}
