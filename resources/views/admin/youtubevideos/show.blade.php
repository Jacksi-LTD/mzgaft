@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('app.youtubevideos') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.youtubevideos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.audioBook.fields.id') }}
                        </th>
                        <td>
                            {{ $show->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audioBook.fields.title') }}
                        </th>
                        <td>
                            {{ $show->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.url') }}
                        </th>
                        <td>
                            <a href="{{ $show->url}}" target="_blank">{{ $show->url }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audioBook.fields.category') }}
                        </th>
                        <td>
                            {{ $show->category->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.audioBook.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $show->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audioBook.fields.image') }}
                        </th>
                        <td>
                            @if($show->image)
                                <a href="{{ $show->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $show->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.youtubevideos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection