@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.profile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.id') }}
                        </th>
                        <td>
                            {{ $profile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.name') }}
                        </th>
                        <td>
                            {{ $profile->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.address') }}
                        </th>
                        <td>
                            {{ $profile->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.serie') }}
                        </th>
                        <td>
                            {{ $profile->serie->mnemonic ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.number') }}
                        </th>
                        <td>
                            {{ $profile->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.valid_year') }}
                        </th>
                        <td>
                            {{ $profile->valid_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.region') }}
                        </th>
                        <td>
                            {{ $profile->region->denj ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.place') }}
                        </th>
                        <td>
                            {{ $profile->place->denloc ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.image') }}
                        </th>
                        <td>
                            @if($profile->image)
                                <a href="{{ $profile->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $profile->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection