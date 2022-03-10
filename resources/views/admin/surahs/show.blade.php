@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.surah.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.surahs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.surah.fields.id') }}
                        </th>
                        <td>
                            {{ $surah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surah.fields.name') }}
                        </th>
                        <td>
                            {{ $surah->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surah.fields.number') }}
                        </th>
                        <td>
                            {{ $surah->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surah.fields.download') }}
                        </th>
                        <td>
                            {{ App\Models\Surah::DOWNLOAD_RADIO[$surah->download] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.surahs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#surah_ayas" role="tab" data-toggle="tab">
                {{ trans('cruds.aya.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="surah_ayas">
            @includeIf('admin.surahs.relationships.surahAyas', ['ayas' => $surah->surahAyas])
        </div>
    </div>
</div>

@endsection