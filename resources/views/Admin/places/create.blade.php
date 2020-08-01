@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.place.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.places.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="denloc">{{ trans('cruds.place.fields.denloc') }}</label>
                <input class="form-control {{ $errors->has('denloc') ? 'is-invalid' : '' }}" type="text" name="denloc" id="denloc" value="{{ old('denloc', '') }}" required>
                @if($errors->has('denloc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('denloc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.denloc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="codp">{{ trans('cruds.place.fields.codp') }}</label>
                <input class="form-control {{ $errors->has('codp') ? 'is-invalid' : '' }}" type="text" name="codp" id="codp" value="{{ old('codp', '') }}" required>
                @if($errors->has('codp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.codp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sirsup">{{ trans('cruds.place.fields.sirsup') }}</label>
                <input class="form-control {{ $errors->has('sirsup') ? 'is-invalid' : '' }}" type="text" name="sirsup" id="sirsup" value="{{ old('sirsup', '') }}" required>
                @if($errors->has('sirsup'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sirsup') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.sirsup_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tip">{{ trans('cruds.place.fields.tip') }}</label>
                <input class="form-control {{ $errors->has('tip') ? 'is-invalid' : '' }}" type="number" name="tip" id="tip" value="{{ old('tip', '') }}" step="1" required>
                @if($errors->has('tip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.tip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zona">{{ trans('cruds.place.fields.zona') }}</label>
                <input class="form-control {{ $errors->has('zona') ? 'is-invalid' : '' }}" type="number" name="zona" id="zona" value="{{ old('zona', '') }}" step="1" required>
                @if($errors->has('zona'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zona') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.zona_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="niv">{{ trans('cruds.place.fields.niv') }}</label>
                <input class="form-control {{ $errors->has('niv') ? 'is-invalid' : '' }}" type="number" name="niv" id="niv" value="{{ old('niv', '') }}" step="1" required>
                @if($errors->has('niv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('niv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.niv_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="med">{{ trans('cruds.place.fields.med') }}</label>
                <input class="form-control {{ $errors->has('med') ? 'is-invalid' : '' }}" type="number" name="med" id="med" value="{{ old('med', '') }}" step="1" required>
                @if($errors->has('med'))
                    <div class="invalid-feedback">
                        {{ $errors->first('med') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.med_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="regiune">{{ trans('cruds.place.fields.regiune') }}</label>
                <input class="form-control {{ $errors->has('regiune') ? 'is-invalid' : '' }}" type="number" name="regiune" id="regiune" value="{{ old('regiune', '') }}" step="1" required>
                @if($errors->has('regiune'))
                    <div class="invalid-feedback">
                        {{ $errors->first('regiune') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.regiune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fsj">{{ trans('cruds.place.fields.fsj') }}</label>
                <input class="form-control {{ $errors->has('fsj') ? 'is-invalid' : '' }}" type="number" name="fsj" id="fsj" value="{{ old('fsj', '') }}" step="1">
                @if($errors->has('fsj'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fsj') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.fsj_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fs_2">{{ trans('cruds.place.fields.fs_2') }}</label>
                <input class="form-control {{ $errors->has('fs_2') ? 'is-invalid' : '' }}" type="text" name="fs_2" id="fs_2" value="{{ old('fs_2', '') }}">
                @if($errors->has('fs_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fs_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.fs_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fs_3">{{ trans('cruds.place.fields.fs_3') }}</label>
                <input class="form-control {{ $errors->has('fs_3') ? 'is-invalid' : '' }}" type="text" name="fs_3" id="fs_3" value="{{ old('fs_3', '') }}">
                @if($errors->has('fs_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fs_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.fs_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fsl">{{ trans('cruds.place.fields.fsl') }}</label>
                <input class="form-control {{ $errors->has('fsl') ? 'is-invalid' : '' }}" type="number" name="fsl" id="fsl" value="{{ old('fsl', '') }}" step="1">
                @if($errors->has('fsl'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fsl') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.fsl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rang">{{ trans('cruds.place.fields.rang') }}</label>
                <input class="form-control {{ $errors->has('rang') ? 'is-invalid' : '' }}" type="text" name="rang" id="rang" value="{{ old('rang', '') }}">
                @if($errors->has('rang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.rang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fictiv">{{ trans('cruds.place.fields.fictiv') }}</label>
                <input class="form-control {{ $errors->has('fictiv') ? 'is-invalid' : '' }}" type="text" name="fictiv" id="fictiv" value="{{ old('fictiv', '') }}">
                @if($errors->has('fictiv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fictiv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.fictiv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_id">{{ trans('cruds.place.fields.region') }}</label>
                <select class="form-control select2 {{ $errors->has('region') ? 'is-invalid' : '' }}" name="region_id" id="region_id">
                    @foreach($regions as $id => $region)
                        <option value="{{ $id }}" {{ old('region_id') == $id ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
                </select>
                @if($errors->has('region'))
                    <div class="invalid-feedback">
                        {{ $errors->first('region') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.place.fields.region_helper') }}</span>
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