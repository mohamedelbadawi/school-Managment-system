<div class="table-responsive">
    <button wire:click="showAddForm" class="btn btn-success">Add Parents</button>

    <table class="table datatable  table-striped table-bordered p-0">
        <thead>
            <tr>

                <th>Email</th>
                <th>Father name</th>
                <th>mother name</th>
                <th>father job</th>
                <th>National number</th>
                <th>father phone</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($parents as $parent)
                <tr>

                    <td>{{ $parent->email }}</td>
                    <td>{{ $parent->father_name }}</td>
                    <td>{{ $parent->mom_name }}</td>
                    <td>{{ $parent->father_job }}</td>
                    <td>{{ $parent->father_national_id }}</td>
                    <td>{{ $parent->father_phone }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm m-1" wire:click="edit('{{ $parent->id }}')">Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click="delete('{{ $parent->id }}')">Delete</button>

                    </td>
                </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th>Email</th>
                <th>Father name</th>
                <th>mother name</th>
                <th>father job</th>
                <th>National number</th>
                <th>father phone</th>
                <th>Actions</th>

            </tr>
        </tfoot>

    </table>
</div>
