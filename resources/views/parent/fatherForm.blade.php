@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col">
                <label for="title">Father email</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">Father password</label>
                <input type="password" wire:model="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="title">Father name(ar)</label>
                <input type="text" wire:model="father_name_ar" class="form-control">
                @error('father_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">Father name (en)</label>
                <input type="text" wire:model="father_name_en" class="form-control">
                @error('father_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">father job (ar)</label>
                <input type="text" wire:model="father_job_ar" class="form-control">
                @error('father_job_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">father job(en)</label>
                <input type="text" wire:model="father_job_en" class="form-control">
                @error('father_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">National ID</label>
                <input type="text" wire:model="father_national_id" class="form-control">
                @error('father_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="col">
                <label for="title">father phone</label>
                <input type="text" wire:model="father_phone" class="form-control">
                @error('father_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">father Nationality</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="father_nationality_id">
                    <option selected>choose</option>
                    @foreach ($Nationalities as $National)
                        <option value="{{ $National->id }}">{{ $National->name }}</option>
                    @endforeach
                </select>
                @error('father_nationality_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col">
                <label for="inputZip">Father Religion</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="father_religion_id">
                    <option selected>Choose...</option>
                    @foreach ($Religions as $Religion)
                        <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                    @endforeach
                </select>
                @error('father_religion_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Father Address</label>
            <textarea class="form-control" wire:model="father_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('father_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStep" type="button">Next
        </button>

    </div>
</div>
</div>
