<div class="mb-3">
    <label for="name" class="form-label">Hospital Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $hospital->name ?? '') }}" required>
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" name="address" rows="3" required>{{ old('address', $hospital->address ?? '') }}</textarea>
    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone', $hospital->phone ?? '') }}" required>
    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="file" class="form-control" name="logo" {{ isset($hospital) ? '' : 'required' }}>
    @error('logo') <small class="text-danger">{{ $message }}</small> @enderror

    @if(isset($hospital) && $hospital->logo)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $hospital->logo) }}" width="80">
        </div>
    @endif
</div>

<button class="btn btn-success">{{ $buttonText }}</button>
<a href="{{ route('backend.hospitals.index') }}" class="btn btn-secondary">Cancel</a>
