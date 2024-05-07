@extends('layouts.admin')
@section('content')
    <style>
        .hidden{
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.audioBook.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.hadith.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.audioBook.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.title_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="category_id">{{ trans('cruds.audioBook.fields.category') }}</label>
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
                    <span class="help-block">{{ trans('cruds.audioBook.fields.category_helper') }}</span>
                </div>

                <div id="chapter" class="hidden"><i class="fa fa-spinner fa-spin fa-x2"></i> </div>


                <div class="form-group">
                    <label class="required" for="content">{{ trans('cruds.audioBook.fields.content') }}</label>
                    <textarea required class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details"
                        id="details">{!! old('details') !!}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('details') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.content_helper') }}</span>
                </div>


                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.narrated_by') }}</label>
                    <input class="form-control {{ $errors->has('narrated_by') ? 'is-invalid' : '' }}" type="text" name="narrated_by"
                           id="narrated_by" value="{{ old('narrated_by', '') }}" required>
                    @if ($errors->has('narrated_by'))
                        <span class="text-danger">{{ $errors->first('narrated_by') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number"
                           id="narrated_by" value="{{ old('number', '') }}" required>
                    @if ($errors->has('number'))
                        <span class="text-danger">{{ $errors->first('number') }}</span>
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
        $('#category_id').on('change',function () {

            var category_id = $('#category_id option:selected').val();
            $.ajax({
                url:'{{url('admin/get/chapters')}}',
                dataType:'html',
                type:'post',
                data:{category_id:category_id,_token:'{{csrf_token()}}'},
                beforeSend: function()
                {
                    $('#chapter').removeClass('hidden');
                },success: function(data)
                {
                    $('#chapter').html(data);
                }
            });
        });
    </script>

@endsection
