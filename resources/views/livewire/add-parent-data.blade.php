<div>

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-dark' : 'btn-success' }}">1</a>
                <p>Father Information</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-dark' : 'btn-success' }}">2</a>
                <p>Mother Information</p>
            </div>

        </div>
    </div>

    @include('parent.fatherForm')
    @include('parent.momForm')




</div>
