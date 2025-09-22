@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('app.muslim_fortress_category') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.muslim-fortress-categories.update", [$muslim_fortress_category->id]) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('app.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $muslim_fortress_category->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>

            <input type="hidden" name="type" value="muslim_fortress">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
