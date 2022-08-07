<div>
    <div class="d-flex">

        <div class="form-group col-4">
            <label for="grade_id">Grade</label>
            <select name="grade_id" wire:model="grade_id" class="custom-select" id="">
                <option>Choose the grade</option>

                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
            @error('grade_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-4">
            <label for="level_id">levels</label>
            <select name="level_id" wire:model="level_id" class="custom-select" id="">
                <option value="">Choose level</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            @error('level_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       
    </div>
</div>
