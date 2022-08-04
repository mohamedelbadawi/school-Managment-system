<div class="card-body">

    <form action="{{ route('student.store') }}" class="form" method="post">
        @csrf
        <div class="d-flex">
            <div class="form-group mr-1">
                <label for="name_ar">
                    student name (ar)
                </label>
                <input type="text" class="form-control border" name="name_ar">
                @error('name_ar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name_en">
                    student name (en)
                </label>
                <input type="text" class="form-control border" name="name_en">
                @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email">
                Email
            </label>
            <input type="email" class="form-control border" name="email">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">
                password
            </label>
            <input type="password" class="form-control border" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- <div class="form-group">
                                  <label for="specializaion_id">specialization</label>
                                  <select name="specialization_id" class="form-control" id="">
                                      <option value="">Choose specialization</option>
                                      @foreach ($specializations as $spe)
                                          <option value="{{ $spe->id }}">{{ $spe->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('specialization_id')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              {{-- </div> --}}


        <div class="d-flex ">

            <div class="form-group col-6">
                <label for="gender_id">Gender</label>
                <select name="gender_id" class="form-control" id="">
                    <option value="">Choose gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>
                @error('gender_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-6">
                <label for="nationlitie_id">Nationality</label>
                <select name="nationlitie_id" class="form-control" id="">
                    <option value="">Choose nationality</option>
                    @foreach ($nationalities as $nationlitie)
                        <option value="{{ $nationlitie->id }}">{{ $nationlitie->name }}</option>
                    @endforeach
                </select>
                @error('nationlitie_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <hr class="m-2">
        <div class="d-flex">

            <div class="form-group col-6">
                <label for="blood_id">Blood</label>
                <select name="blood_id" class="form-control" id="">
                    <option value="">Choose blood</option>
                    @foreach ($bloodTypes as $blood)
                        <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                    @endforeach
                </select>
                @error('blood_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="parent_id">parents</label>
                <select name="parent_id" class="form-control" id="">
                    <option value="">Choose parent</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <hr class="m-2">

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
                <select name="classroom_id" class="form-control" id="">
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


        <hr class="m-2">



        <div class="form-group">
            <label for="">birth date</label>
            <input type="date" class="form-control" name="date_birth">
        </div>


        <div class="modal-footer">
            <button class="btn btn-success" type="submit">Add Student</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
</div>

</div>
{{-- end create modal --}}
