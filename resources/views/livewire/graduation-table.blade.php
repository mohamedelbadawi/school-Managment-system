<div>

    <table class="table datatable  table-striped table-bordered p-0">
        <thead>
            <tr>

                <th>Email</th>
                <th>name</th>
                <th>Father name</th>
                <th>gender</th>
                <th>Nationality</th>
                <th>graduated at</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($students as $student)
                <tr>

                    <td>{{ $student->email }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->parent->father_name }}</td>
                    <td>{{ $student->gender->name }}</td>
                    <td>{{ $student->nationality->name }}</td>
                    <td>{{ $student->deleted_at->diffForHumans() }}</td>

                    <td>

                        <button class="btn btn-outline-primary btn-sm m-1"
                            wire:click="cancelGraduation('{{ $student->id }}')">Cancel</button>


                        <button class="btn btn-outline-danger btn-sm" wire:click="deleteGraduation('{{$student->id}}')">Delete</button>

                    </td>
                </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th>Email</th>
                <th>name</th>
                <th>Father name</th>
                <th>gender</th>
                <th>Nationality</th>
                <th>graduated at</th>
                <th>Actions</th>

            </tr>
        </tfoot>

    </table>
</div>
