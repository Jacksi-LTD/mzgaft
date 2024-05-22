@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('app.pleads') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pleads.update", [$pleads->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('app.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="name" value="{{ old('title', $pleads->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('app.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }} ckeditor"  name="details"  required>{{ $pleads->details }}</textarea>
                @if($errors->has('details'))
                    <span class="text-danger">{{ $errors->first('details') }}</span>
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
