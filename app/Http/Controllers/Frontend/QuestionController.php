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
        $questions = Question::with(['category', 'person', 'created_by'])->paginate();

        $some_questions = Question::with(['category', 'person', 'created_by'])->limit(5)->get();

        $categories = Category::get();

        $people = Person::get();

        $users = User::get();

        return view('frontend.questions.index', compact('categories', 'people', 'questions', 'users', 'some_questions'));
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('category', 'person', 'created_by');

        return view('frontend.questions.show', compact('question'));
    }
}
