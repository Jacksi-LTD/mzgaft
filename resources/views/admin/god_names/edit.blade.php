@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('app.god_names') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.god_names.update", [$god_names->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('app.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $god_names->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('app.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}"  name="details"  required>{{ $god_names->details }}</textarea>
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
