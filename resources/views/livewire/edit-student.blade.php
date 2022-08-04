<div class="">


    <div class="d-flex">

        <div class="form-group col-4">
            <label for="grade_id">Grade</label>
            <select name="grade_id" wire:model="grade_id" class="form-control" id="">
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
            <select name="level_id" wire:model="level_id" class="form-control" id="">
                <option value="">Choose level</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            @error('level_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-4">
            <label for="classroom_id">classroom</label>
            <select name="classroom_id" wire:model="classroom_id" class="form-control" id="">
                <option value="">Choose classroom</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}
                    </option>
                @endforeach
            </select>
            @error('classroom_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


</div>
