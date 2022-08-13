<div class="">

    <form method="post" action="{{ route('attendance.store') }}">
        <h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
        <input type="date" placeholder="choose date" name="attendance_date" class="form-control"
            wire:model="attendance_day">

        @csrf
        <table class="table datatable table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th class="alert-success">#</th>
                    <th class="alert-success">name</th>
                    <th class="alert-success">email</th>
                    <th class="alert-success">gender</th>

                    <th class="alert-success">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class=" @if (in_array($student->id, $attendances)) alert-danger @endif ">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender->name }}</td>
                        <td>


                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="checkbox"
                                    @if (in_array($student->id, $attendances)) checked @endif value="absent">
                                <span class="text-danger">Apsent</span>
                            </label>

                            <input type="text" hidden value="{{ $classroom->id }}" name="classroom_id">

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">submit</button>
        </P>
    </form><br>
</div>
