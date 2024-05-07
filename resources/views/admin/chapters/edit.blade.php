@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('app.chapters') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.chapters.update', [$edit->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.audioBook.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', $edit->title) }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.title_helper') }}</span>
                </div>




                <div class="form-group">
                    <label class="required" for="category_id">{{ trans('cruds.audioBook.fields.category') }}</label>
                    <select required class="form-control select2 {{ $errors->has('cat_id') ? 'is-invalid' : '' }}"
                        name="cat_id" id="category_id">
                        @foreach ($categories as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('cat_id') ? old('cat_id') : $edit->category->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.category_helper') }}</span>
                </div>




                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


