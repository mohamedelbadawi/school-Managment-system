<div class="card-body">

    <form action="{{ route('classroom.update', $classroom->id) }}" class="form" method="post">
        @method('PATCH')
        @csrf
        <div class="d-flex">
            <div class="form-group mr-1">
                <label for="name_ar">
                    Arabic name
                </label>
                <input type="text" class="form-control border" name="name_ar"
                    value="{{ $classroom->getTranslation('name', 'ar') }}">
                @error('name_ar')
                    <div class="text-danger">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name_en">
                    English name
                </label>
                <input type="text" class="form-control border" name="name_en"
                    value="{{ $classroom->getTranslation('name', 'en') }}">
                @error('name_en')
                    <div class="text-danger">
                        {{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="note">
                Grades
            </label>
            <select wire:model="grade_id" name="grade_id" class="form-control">
                <option>Choose the grade</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">
                        {{ $grade->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="note">
                levels
            </label>
            <select wire:model="level_id" name="level_id" class="form-control">
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="teachers">
                teachers
            </label>
            <select wire:model="selectedTeachers" name="teachers[]" class="form-control" multiple>
                <option>Choose the grade</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">
                Status
            </label>
            <select name="status" class="form-control">

                <option value="1" @if ($classroom->status == 1) selected @endif> Active</option>
                <option value="0" @if ($classroom->status == 0) selected @endif> InActive</option>

            </select>
        </div>

        <div class="modal-footer">
            <button class="btn btn-success" type="submit">update class room</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
</div>
