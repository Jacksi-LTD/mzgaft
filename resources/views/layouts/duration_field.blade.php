@include('media-library::livewire.partials.collection.fields')

<div class="media-library-field">
    <label class="media-library-label">الوقت</label>
    <input
        class="media-library-input"
        type="text"
        {{ $mediaItem->customPropertyAttributes('duration_field')  }}
    />

    @error($mediaItem->customPropertyErrorName('duration_field'))
        <span class="media-library-text-error">
               {{ $message }}
        </span>
    @enderror
</div>
