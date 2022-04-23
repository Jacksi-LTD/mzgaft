<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Aya;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Person;
use App\Models\Question;

class HomeController
{
    public function index()
    {


        $blogs = Blog::with('writer')->inRandomOrder()
            ->limit(5)
            ->get();

        $questions = Question::with('person')->inRandomOrder()
            ->limit(5)
            ->get();

        $aya = Aya::with('surah')->inRandomOrder()
            ->limit(1)
            ->get()->first();

        $people = Person::where('type', 'audios')->withCount('audios')->get();

        $first_audios = $people?->first()->audios;

        $first_files = $first_audios?->first()?->files;

        $books = Book::with('writer')->limit(10)->get();

        return view('frontend.home', compact('blogs', 'questions', 'aya', 'books', 'people', 'first_audios', 'first_files'));
    }

    public function person(Person $person)
    {
        // $people = Person::where('type', 'audios')->withCount('audios')->get();

        $audios = $person->audios;
    }
}
