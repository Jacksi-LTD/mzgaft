@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('app.hadith') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hadith.index') }}">
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
                            {{ trans('app.number') }}
                        </th>
                        <td>
                            {{ $show->number }}
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
                            {{ trans('app.chapter') }}
                        </th>
                        <td>
                            {{ $show->chapter->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.narrated_by') }}
                        </th>
                        <td>
                            {{ $show->narrated_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audioBook.fields.content') }}
                        </th>
                        <td>
                            {!! $show->details !!}
                        </td>
                    </tr>


                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hadith.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection