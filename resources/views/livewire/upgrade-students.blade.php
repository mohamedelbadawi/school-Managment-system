<div class="">

    <div class=" p-2 mb-2">
        <h6 class="card-header mb-4">Previous</h3>

            <div class="d-flex">
                <div class="form-group col-3">
                    <label for="grade_id">Grade</label>
                    <select name="grade_id_pr" wire:model="grade_id_pr" class="custom-select" id="">
                        <option>Choose the grade</option>

                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                    @error('grade_id_pr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-3">
                    <label for="level_id">levels</label>
                    <select name="level_id_pr" wire:model="level_id_pr" class="custom-select" id="">
                        <option value="">Choose level</option>
                        @foreach ($levels_pr as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </select>
                    @error('level_id_pr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-3">
                    <label for="classroom_id">classroom</label>
                    <select name="classroom_id_pr" wire:model="classroom_id_pr" class="custom-select" id="">
                        <option value="">Choose classroom</option>
                        @foreach ($classrooms_pr as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('classroom_id_pr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    </div>
    <br>
    <div class="mb-4 p-2">
        <h6 class="card-header mb-4">current</h6>
        <div class="d-flex">
            <div class="form-group col-3">
                <label for="grade_id">Grade</label>
                <select name="grade_id_nw" wire:model="grade_id_nw" class="custom-select" id="">
                    <option>Choose the grade</option>

                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                </select>
                @error('grade_id_nw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-3">
                <label for="level_id">levels</label>
                <select name="level_id_nw" wire:model="level_id_nw" class="custom-select" id="">
                    <option value="">Choose level</option>
                    @foreach ($levels_nw as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
                @error('level_id_nw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-3">
                <label for="classroom_id">classroom</label>
                <select name="classroom_id_nw" wire:model="classroom_id_nw" class="custom-select" id="">
                    <option value="">Choose classroom</option>
                    @foreach ($classrooms_nw as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
                @error('classroom_id_nw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>

    <div class="d-flex justify-content-center">

        <button class="btn btn-success" wire:click="upgrade">upgrade</button>
    </div>

</div>
