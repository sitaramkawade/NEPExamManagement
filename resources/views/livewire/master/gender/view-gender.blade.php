<div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gender</th>
                <th>Short Form</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genders as $key => $gender)
                <tr wire:key='{{ $gender->id }}'>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $gender->gender }}</td>
                    <td>{{ $gender->gender_shortform }}</td>
                    <td>{{ $gender->is_active }}</td>
                    <td>
                        <a class="bg-green-500 text-white" href="">Edit</a>
                        <a class="bg-red-500 text-white" href="">Delete</a>
                    </td>
                </tr> 
            @endforeach
        </tbody>
        <tfoot>
            {{ $genders->links() }}
        </tfoot>
    </table>
</div>
