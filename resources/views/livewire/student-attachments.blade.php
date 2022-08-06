<div class="">
    <br>
    <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
        <thead>
            <tr class="table-secondary">
                <th scope="col">file name</th>
                <th scope="col">uploaded at</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student->images as $attachment)
                <tr style='text-align:center;vertical-align:middle'>
                    </td>
                    <td>{{ $attachment->name }}</td>
                    <td>{{ $attachment->created_at->diffForHumans() }}</td>
                    <td colspan="2">
                        <button class="btn btn-outline-info btn-sm" wire:click="download('{{ $attachment->name }}')"
                            role="button"><i class="fas fas-download"></i>&nbsp;
                            Download </button>

                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                            wire:click="delete('{{ $attachment->name }}','{{ $attachment->id }}')"
                            title="{{ trans('Grades_trans.Delete') }}">Delete
                        </button>

                    </td>
                </tr>
              
            @endforeach
        </tbody>
    </table>



</div>
