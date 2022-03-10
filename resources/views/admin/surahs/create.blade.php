@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.surah.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.surahs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.surah.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surah.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.surah.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '0') }}" step="1" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surah.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.surah.fields.download') }}</label>
                @foreach(App\Models\Surah::DOWNLOAD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('download') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="download_{{ $key }}" name="download" value="{{ $key }}" {{ old('download', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="download_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('download'))
                    <span class="text-danger">{{ $errors->first('download') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surah.fields.download_helper') }}</span>
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