<div class="card-body">



    <div class="col-md-3">
        <div class="form-group">
            <label for="academic_year">Attachments
                : <span class="text-danger">*</span></label>
            <input type="file" wire:model="attachments" accept="image/*" name="attachments[]" multiple required>
            @error('attachments')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <br><br>
    <button wire:click="upload" class="button button-border x-small">
        Upload
    </button>




</div>
