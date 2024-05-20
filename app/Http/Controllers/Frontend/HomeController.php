<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Aya;
use App\Models\Blog;
use App\Models\Book;
use App\Models\ContactUs;
use App\Models\Person;
use App\Models\Question;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $blogs = Blog::with('writer')->inRandomOrder()
            ->limit(5)
            ->orderBy('created_at', 'DESC')->get();

        $questions = Question::with('person')->inRandomOrder()
            ->limit(5)
            ->orderBy('created_at', 'DESC')->get();

        $aya = Aya::with('surah')->inRandomOrder()
            ->limit(1)
            ->orderBy('created_at', 'DESC')->get()->first();

        $people = Person::where('type', 'audios')->withCount('audios')->orderBy('created_at', 'DESC')->get();

        $first_audios = $people?->first()->audios;

        $first_files = $first_audios?->first()?->files;

        $books = Book::with('writer')->limit(10)->orderBy('created_at', 'DESC')->get();

        return view('frontend.home', compact('blogs', 'questions', 'aya', 'books', 'people', 'first_audios', 'first_files'));
    }

    public function person(Person $person)
    {
        // $people = Person::where('type', 'audios')->withCount('audios')->orderBy('created_at', 'DESC')->get();

        $audios = $person->audios;
    }


    public function contact_us(){


        return view('frontend.contact_us');
    }

    public function contact_store(Request $request){

        $store=ContactUs::create($request->all());
        return redirect()->back()
            ->with('success', trans('app.Your message has been sent successfully'));
    }

    public function suggestions(){

        return view('frontend.suggestions.index');
    }

    public function suggestions_store(Request $request){
        $store=Suggestion::create($request->all());
        return redirect()->back()
            ->with('success', trans('app.Your message has been sent successfully'));

    }
}
