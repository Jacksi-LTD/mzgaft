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
                <label for="category_id">{{ trans('app.category') }}</label>
                <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $pleads->category_id) == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label for="audio_file">{{ trans('app.audio_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('audio_file') ? 'is-invalid' : '' }}" id="audio_file-dropzone">
                </div>
                @if($errors->has('audio_file'))
                    <span class="text-danger">{{ $errors->first('audio_file') }}</span>
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


@section('scripts')
<script>
    Dropzone.options.audioFileDropzone = {
    url: '{{ route('admin.pleads.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="audio_file"]').remove()
      $('form').append('<input type="hidden" name="audio_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="audio_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($pleads) && $pleads->audio_file && $pleads->audio_file->count() > 0)
      var file = {!! json_encode($pleads->audio_file->first()) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="audio_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }
         return _results
     }
}
</script>
@endsection
