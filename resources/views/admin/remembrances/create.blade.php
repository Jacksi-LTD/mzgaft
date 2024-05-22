@extends('layouts.admin')
@section('content')
    <style>
        .hidden{
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('app.remembrances') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.remembrances.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.audioBook.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.title_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="category_id">{{ trans('cruds.audioBook.fields.category') }}</label>
                    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}"
                        name="category_id" id="category_id">
                        @foreach ($categories as $id => $entry)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="text-danger">{{ $errors->first('category') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.category_helper') }}</span>
                </div>




                <div class="form-group">
                    <label class="required" for="content">{{ trans('cruds.audioBook.fields.content') }}</label>
                    <textarea required class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="content"
                        id="details">{!! old('content') !!}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.content_helper') }}</span>
                </div>


                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.repet') }}</label>
                    <input class="form-control {{ $errors->has('repet') ? 'is-invalid' : '' }}" type="number" name="repet"
                           id="repet" value="{{ old('repet', '') }}" required>
                    @if ($errors->has('repet'))
                        <span class="text-danger">{{ $errors->first('repet') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.number') }}</label>
                    <input  class="form-control {{ $errors->has('sort') ? 'is-invalid' : '' }}" type="number" name="sort"
                           id="narrated_by" value="{{ old('sort', '') }}" required>
                    @if ($errors->has('sort'))
                        <span class="text-danger">{{ $errors->first('sort') }}</span>
                    @endif
                    <span class="help-block"></span>
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

