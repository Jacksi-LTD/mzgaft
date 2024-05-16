@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('app.product') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="title" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('app.name') }}</span>
                </div>

                <div class="form-group">
                    <label for="category_id">{{ trans('cruds.book.fields.category') }}</label>
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
                    <span class="help-block">{{ trans('cruds.book.fields.category_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price"
                           id="title" value="{{ old('price', '') }}" required>
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label for="content">{{ trans('app.description') }}</label>
                    <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details"
                        id="details">{!! old('details') !!}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('details') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="approved" value="0">
                        <input class="form-check-input" type="checkbox" name="approved" id="approved" value="1"
                            {{ old('approved', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="approved">{{ trans('cruds.book.fields.approved') }}</label>
                    </div>
                    @if ($errors->has('approved'))
                        <span class="text-danger">{{ $errors->first('approved') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.book.fields.approved_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="image">{{ trans('cruds.book.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.book.fields.image_helper') }}</span>
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
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.product.storeMedia') }}',
            maxFilesize: 99999, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 99999,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="image"]').remove()
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($book) && $book->image)
                    var file = {!! json_encode($book->image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
    <script>
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.product.storeMedia') }}',
            maxFilesize: 99999, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 99999
            },
            success: function(file, response) {
                $('form').find('input[name="file"]').remove()
                $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($book) && $book->file)
                    var file = {!! json_encode($book->file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
