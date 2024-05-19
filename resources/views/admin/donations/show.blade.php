@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('app.donations') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.donations.index') }}">
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
                            {{ trans('app.bank') }}
                        </th>
                        <td>
                            {{ $show->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.amount') }}
                        </th>
                        <td>
                            {{ $show->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.trans_number') }}
                        </th>
                        <td>
                            {{$show->trans_number}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.image') }}
                        </th>
                        <td>
                            @if($show->image)
                                <a href="{{ $show->image }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $show->image }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.donations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection