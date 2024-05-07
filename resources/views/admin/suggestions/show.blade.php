@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('app.suggestions') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.suggestions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $show->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.name') }}
                        </th>
                        <td>
                            {{ $show->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.phone') }}
                        </th>
                        <td>
                            {{ $show->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.details') }}
                        </th>
                        <td>
                           {{$show->details}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.suggestions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection