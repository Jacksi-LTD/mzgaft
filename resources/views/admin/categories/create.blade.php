@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.category.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Category::TYPE_SELECT as $key => $label)
                        <option class="{{$key}}" value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.type_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="category_id">{{ trans('cruds.category.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($categories as $id => $entry)

                        <option class="{{$entry->type}}" value="{{ $entry->id }}" {{ old('category_id') == $id ? '' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.category_helper') }}</span>
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
@section('scripts')
@parent
<script>
$(document).ready(function () {
    var allOptions = $('#category_id option')
    $('#type').change(function () {
        $('#category_id option').remove(); //remove all options
        var classN = $('#type option:selected').prop('class'); //get the
        var opts = allOptions.filter('.' + classN); //selected option's classname
        $.each(opts, function (i, j) {
            $(j).appendTo('#category_id'); //append those options back
        });
    });
});
</script>
@endsection
