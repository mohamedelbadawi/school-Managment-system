@if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-group">
            <label for="">Attachments</label>
            <input type="file" wire:model="attachments" id="images" accept="image/*" class="form-control" multiple>
        </div>

        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right mr-2" type="button" wire:click="back(2)">
            Back
        </button>
        @if ($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mr-2" type="button"
                wire:click="update">update</button>
        @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mr-2" type="button"
                    wire:click="submit">submit</button>
        @endif

    </div>
</div>




</div>
