@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.surah.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.surahs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.surah.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.surah.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="number">{{ trans('cruds.surah.fields.number') }}</label>
                            <input class="form-control" type="number" name="number" id="number" value="{{ old('number', '0') }}" step="1" required>
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.surah.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.surah.fields.download') }}</label>
                            @foreach(App\Models\Surah::DOWNLOAD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="download_{{ $key }}" name="download" value="{{ $key }}" {{ old('download', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="download_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('download'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('download') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection