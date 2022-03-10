@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.audio.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.audios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.id') }}
                        </th>
                        <td>
                            {{ $audio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.title') }}
                        </th>
                        <td>
                            {{ $audio->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.visits') }}
                        </th>
                        <td>
                            {{ $audio->visits }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.writer') }}
                        </th>
                        <td>
                            {{ $audio->writer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.category') }}
                        </th>
                        <td>
                            {{ $audio->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.content') }}
                        </th>
                        <td>
                            {!! $audio->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $audio->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.files') }}
                        </th>
                        <td>
                            @foreach($audio->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audio.fields.images') }}
                        </th>
                        <td>
                            @foreach($audio->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.audios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection