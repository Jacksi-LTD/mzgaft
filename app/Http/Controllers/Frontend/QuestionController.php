<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Person;
use App\Models\Question;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        $categories = Category::where(['type'=> 'questions','category_id'=>null])->orderBy('created_at', 'DESC')->get();

        return view('frontend.questions.index', compact('categories'));
    }

    public function category(Category $category)
    {
        //dd($category->id);
        $questions = Question::with(['person', 'category', 'created_by', 'media'])->where('category_id', $category->id);

        //dd($questions);

        $some_questions = Question::with(['person', 'category', 'created_by', 'media'])->favorite()->orderBy('created_at', 'DESC')->get();

        $count = $questions->count();

        $questions = $questions->paginate();
        return view('frontend.questions.category', compact('questions', 'count', 'some_questions', 'category'));
    }

    public function show(Question $question)
    {
        $question->load('category', 'person', 'created_by');

        return view('frontend.questions.show', compact('question'));
    }
}
