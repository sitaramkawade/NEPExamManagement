<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Timetable</title>
</head>
<body>
    <h1>Exam Timetable </h1>
    <table>
        <thead>
            <tr>
              
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Date</th>
                <th>Timeslot</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($exam_time_table_data as $row)
            <tr>
                <td>{{ $row->subject ->subject_code}}</td>
                <td>{{ $row->subject ->subject_name}}</td>
                <td>{{ $row->examdate }}</td>
                <td>{{ $row->timetableslot->timeslot }}</td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>