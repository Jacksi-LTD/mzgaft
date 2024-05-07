<div class="form-group">
    <label for="category_id">{{ trans('app.chapter') }}</label>
    <select class="form-control select2 {{ $errors->has('chapter_id') ? 'is-invalid' : '' }}"
            name="chapter_id" id="chapter_id">
        @foreach ($chapters as $chapter)
            <option value="{{ $chapter->id }}" {{ old('chapter_id') == $chapter->id ? 'selected' : '' }}>
                {{ $chapter->title }}</option>
        @endforeach
    </select>
    @if ($errors->has('chapter_id'))
        <span class="text-danger">{{ $errors->first('chapter_id') }}</span>
    @endif
    <span class="help-block"></span>
</div>