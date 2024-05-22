@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.audioBook.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.remembrances.update', [$edit->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.audioBook.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', $edit->title) }}" required>
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
                            <option value="{{ $id }}"
                                {{ (old('category_id') ? old('category_id') : $edit->category->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="text-danger">{{ $errors->first('category') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.category_helper') }}</span>
                </div>



                <div class="form-group">
                    <label for="content">{{ trans('cruds.audioBook.fields.content') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content"
                        id="content">{!! old('details', $edit->content) !!}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.audioBook.fields.content_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.repet') }}</label>
                    <input class="form-control {{ $errors->has('repet') ? 'is-invalid' : '' }}" type="number" name="repet"
                           id="repet" value="{{ $edit->repet }}" required>
                    @if ($errors->has('repet'))
                        <span class="text-danger">{{ $errors->first('repet') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label class="required" for="title">{{ trans('app.number') }}</label>
                    <input class="form-control {{ $errors->has('sort') ? 'is-invalid' : '' }}" type="number" name="sort"
                           id="narrated_by" value="{{$edit->sort}}" required>
                    @if ($errors->has('sort'))
                        <span class="text-danger">{{ $errors->first('sort') }}</span>
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