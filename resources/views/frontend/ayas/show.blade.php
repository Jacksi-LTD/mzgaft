@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.aya.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.ayas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.aya.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $aya->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.aya.fields.aya') }}
                                    </th>
                                    <td>
                                        {{ $aya->aya }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.aya.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $aya->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.aya.fields.tafsir') }}
                                    </th>
                                    <td>
                                        {!! $aya->tafsir !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.aya.fields.surah') }}
                                    </th>
                                    <td>
                                        {{ $aya->surah->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.ayas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection