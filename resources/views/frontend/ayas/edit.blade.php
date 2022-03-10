@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.aya.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.ayas.update", [$aya->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="aya">{{ trans('cruds.aya.fields.aya') }}</label>
                            <input class="form-control" type="text" name="aya" id="aya" value="{{ old('aya', $aya->aya) }}" required>
                            @if($errors->has('aya'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('aya') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.aya.fields.aya_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="number">{{ trans('cruds.aya.fields.number') }}</label>
                            <input class="form-control" type="number" name="number" id="number" value="{{ old('number', $aya->number) }}" step="1" required>
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.aya.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tafsir">{{ trans('cruds.aya.fields.tafsir') }}</label>
                            <textarea class="form-control ckeditor" name="tafsir" id="tafsir">{!! old('tafsir', $aya->tafsir) !!}</textarea>
                            @if($errors->has('tafsir'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tafsir') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.aya.fields.tafsir_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="surah_id">{{ trans('cruds.aya.fields.surah') }}</label>
                            <select class="form-control select2" name="surah_id" id="surah_id" required>
                                @foreach($surahs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('surah_id') ? old('surah_id') : $aya->surah->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('surah'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surah') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.aya.fields.surah_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.ayas.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $aya->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection