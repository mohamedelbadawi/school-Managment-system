@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col">
                <label for="title">Arabic name</label>
                <input type="text" wire:model="mom_name_ar" class="form-control">
                @error('mom_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">English name</label>
                <input type="text" wire:model="mom_name_en" class="form-control">
                @error('mom_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">Mother job (ar)</label>
                <input type="text" wire:model="mom_job_ar" class="form-control">
                @error('mom_job_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">Mother job (En)</label>
                <input type="text" wire:model="mom_job_en" class="form-control">
                @error('mom_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">Mother National Id</label>
                <input type="text" wire:model="mom_national_id" class="form-control">
                @error('mom_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="col">
                <label for="title">Mother phone</label>
                <input type="text" wire:model="mom_phone" class="form-control">
                @error('mom_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Mother Nationality</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="mom_nationality_id">
                    <option selected>Choose...</option>
                    @foreach ($Nationalities as $National)
                        <option value="{{ $National->id }}">{{ $National->name }}</option>
                    @endforeach
                </select>
                @error('mom_nationality_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col">
                <label for="inputZip">Mother religion</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="mom_religion_id">
                    <option selected>Choose...</option>
                    @foreach ($Religions as $Religion)
                        <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                    @endforeach
                </select>
                @error('mom_religion_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mom Address</label>
            <textarea class="form-control" wire:model="mom_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('mom_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right mr-2" type="button" wire:click="back(1)">
            Back
        </button>

        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mr-2" type="button"
            wire:click="secondStep">Next</button>


    </div>
</div>




</div>
