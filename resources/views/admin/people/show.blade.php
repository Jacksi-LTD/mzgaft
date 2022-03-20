@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.person.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.people.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.id') }}
                        </th>
                        <td>
                            {{ $person->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.name') }}
                        </th>
                        <td>
                            {{ $person->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Person::TYPE_SELECT[$person->type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.people.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection