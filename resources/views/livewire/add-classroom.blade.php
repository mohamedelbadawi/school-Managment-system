<div class="card-body">

    <form action="{{ route('classroom.store') }}" class="form" method="post">
        @csrf
        <div class="d-flex">
            <div class="form-group mr-1">
                <label for="name_ar">
                    Arabic name
                </label>
                <input type="text" class="form-control border" name="name_ar">
                @error('name_ar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name_en">
                    English name
                </label>
                <input type="text" class="form-control border" name="name_en">
                @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
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
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
        @if (count($levels) > 0)
            <div class="form-group">
                <label for="note">
                    levels
                </label>
                <select wire:model="level_id" name="level_id" class="form-control">
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="modal-footer">
            <button class="btn btn-success" type="submit">Add classroom</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
</div>
