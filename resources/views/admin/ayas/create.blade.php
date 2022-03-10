@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.aya.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ayas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="aya">{{ trans('cruds.aya.fields.aya') }}</label>
                <input class="form-control {{ $errors->has('aya') ? 'is-invalid' : '' }}" type="text" name="aya" id="aya" value="{{ old('aya', '') }}" required>
                @if($errors->has('aya'))
                    <span class="text-danger">{{ $errors->first('aya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aya.fields.aya_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.aya.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '') }}" step="1" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aya.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tafsir">{{ trans('cruds.aya.fields.tafsir') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('tafsir') ? 'is-invalid' : '' }}" name="tafsir" id="tafsir">{!! old('tafsir') !!}</textarea>
                @if($errors->has('tafsir'))
                    <span class="text-danger">{{ $errors->first('tafsir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aya.fields.tafsir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="surah_id">{{ trans('cruds.aya.fields.surah') }}</label>
                <select class="form-control select2 {{ $errors->has('surah') ? 'is-invalid' : '' }}" name="surah_id" id="surah_id" required>
                    @foreach($surahs as $id => $entry)
                        <option value="{{ $id }}" {{ old('surah_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('surah'))
                    <span class="text-danger">{{ $errors->first('surah') }}</span>
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
                xhr.open('POST', '{{ route('admin.ayas.storeCKEditorImages') }}', true);
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