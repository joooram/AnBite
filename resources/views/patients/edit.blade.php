{{-- Mapapansin mo na idinagdag natin ang pasyente ID sa route at ang @method('PUT') --}}
<form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Halimbawa ng input, lalagyan mo ng value="{{ $patient->pangalan_ng_column }}" --}}
    <div class="form-group">
        <label>Patient Name</label>
        <input type="text" name="name" value="{{ $patient->name }}" required>
    </div>

    <div class="btn-row">
        <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
        <button type="submit" class="btn-save">Update Patient</button>
    </div>
</form>