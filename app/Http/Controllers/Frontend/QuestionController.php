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
        $questions = Question::with(['category', 'person', 'created_by'])->orderBy('id', 'desc')->paginate();

        $some_questions = Question::with(['category', 'person', 'created_by'])->limit(5)->orderBy('id', 'DESC')->get();

        $count = Question::count();

        return view('frontend.questions.index', compact('questions', 'count', 'some_questions'));
    }

    public function show(Question $question)
    {
        $question->load('category', 'person', 'created_by');

        return view('frontend.questions.show', compact('question'));
    }
}
