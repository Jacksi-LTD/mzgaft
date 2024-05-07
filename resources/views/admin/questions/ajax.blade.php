<div class="form-group">
    <label for="category_id">{{ trans('app.subcategory') }}</label>
    <select class="form-control select2 {{ $errors->has('sub_id') ? 'is-invalid' : '' }}" name="sub_id" id="sub_id">
        @foreach($subs as $sub)
            <option value="{{$sub->id}}" {{ old('sub_id') == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
        @endforeach
    </select>
    @if($errors->has('sub_id'))
        <span class="text-danger">{{ $errors->first('sub_id') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.question.fields.category_helper') }}</span>
</div>