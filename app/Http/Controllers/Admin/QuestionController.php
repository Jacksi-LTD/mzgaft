<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Category;
use App\Models\Person;
use App\Models\Question;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Question::with(['category', 'person', 'created_by'])->select(sprintf('%s.*', (new Question())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'question_show';
                $editGate = 'question_edit';
                $deleteGate = 'question_delete';
                $crudRoutePart = 'questions';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('answer', function ($row) {
                return $row->answer ? $row->answer : '';
            })->escapeColumns([]);
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->addColumn('person_name', function ($row) {
                return $row->person ? $row->person->name : '';
            });

            $table->editColumn('visits', function ($row) {
                return $row->visits ? $row->visits : '';
            });
            $table->editColumn('approved', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approved ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'person', 'approved']);

            return $table->make(true);
        }

        $categories = Category::get();
        $people     = Person::where('type', 'questions')->get();
        $users      = User::get();

        return view('admin.questions.index', compact('categories', 'people', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::where('type', 'questions')->where('category_id',null)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $people = Person::where('type', 'questions')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questions.create', compact('categories', 'people'));
    }

    public function sub_cats(Request $request){

        $subs=Category::where('category_id',$request->category_id)->get();

        return view('admin.questions.ajax',compact('subs'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $question->id]);
        }

        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::where('type', 'questions')->where('category_id',null)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $people = Person::where('type', 'questions')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $question->load('category', 'person', 'created_by');

        $subs=Category::where('category_id',$question->category_id)->get();

        return view('admin.questions.edit', compact('categories', 'people', 'question','subs'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->route('admin.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('category', 'person', 'created_by');

        return view('admin.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('question_create') && Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Question();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
