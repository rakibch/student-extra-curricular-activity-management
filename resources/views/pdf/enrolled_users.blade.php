<!DOCTYPE html>
<html>
<head>
    <title>Enrolled Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Enrolled Users</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Activity Name</th>
                <th>Student Name</th>
                <th>Student Id</th>
                <th>Student Email</th>
                <th>Class</th>
                <th>Applied Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrolledUserList as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->activity_details->activity_name ?? '' }}</td>
                    <td>{{ $value->user_details->name ?? '' }}</td>
                    <td>{{ $value->user_details->student_id ?? '' }}</td>
                    <td>{{ $value->user_details->email ?? '' }}</td>
                    <td>{{ $value->user_details->class ?? '' }}</td>
                    <td>{{ $value->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
