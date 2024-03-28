<html>

<head>
    <meta charset="UTF-8" />
    <title>Internal Tool Report</title>
    <style>
        @page {
            margin: 30px 30px 30px 30px;
        }

        td {
            font-size: 12px;
        }

        th {
            padding: 3px;
            font-size: 12px !important;
            text-transform: uppercase;
            border: 1px solid black;
        }

        .rowspace {
            font-size: 14px !important;
        }
    </style>
</head>

<body>
    <table style="width:100%; border-bottom:1pt dotted black; margin-bottom:5px;">
        <tr>
            <td align="center" width="20px">
                <img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('img/logo.jpg'))) }}" style="width: 100px; height: 60px;" />
            </td>
        </tr>
        <tr>
            <td width="300px" align="center"> Sangamner Nagarpalika Arts, D.J. Malpani Commerce and B.N. Sarda Science College (Autonomous) Sangamner <br> (Affiliated to Savitribai Phule Pune University)</td>
        </tr>
    </table>

    <h5 width="300px" align="center">Internal Tool Report</h5>

    <table style="border: 1px solid black; border-collapse: collapse; margin-bottom: 15px; width: 100%;" cellspacing="0">
        <tbody>
            <tr>
                <th style="border: 1px solid black; padding: 8px; width:170px; text-align:left;">Academic Year</th>
                <td style="border: 1px solid black; padding: 8px; text-align:left;">{{ $academic_year }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align:left;">Faculty Name</th>
                <td style="border: 1px solid black; padding: 8px; text-align:left;">{{ $faculty }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align:left;">Subject Name</th>
                <td style="border: 1px solid black; padding: 8px; text-align:left;">{{ $subject }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align:left;">Department Head Name</th>
                <td style="border: 1px solid black; padding: 8px; text-align:left;">{{ $department_head }}</td>
            </tr>
        </tbody>
    </table>

    <table style="border: 1px solid black; border-collapse: collapse;" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Tool Name</th>
                <th>Document Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grouped_internal_tools_docs as $tool_name => $tool_and_documents)
                {{-- Row with tool name --}}
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: center;" rowspan="{{ count($tool_and_documents) }}">{{ $tool_name }}</td>
                    {{-- Loop over documents for the current tool --}}
                    @foreach ($tool_and_documents as $index => $tool_and_document)
                        {{-- Print the document name --}}
                        @if ($index !== 0)
                <tr>
            @endif
            <td style="border: 1px solid black; padding: 5px; text-align: center;">{{ $tool_and_document['internaltooldocument_name'] }}</td>
            {{-- Check if document is uploaded --}}
            <td style="border: 1px solid black; padding: 5px; text-align: center; font-family: DejaVu Sans, sans-serif;">
                @if ($tool_and_document['document_fileName'] && $tool_and_document['document_filePath'])
                    {{-- Document uploaded --}}
                    &#10004; {{-- Checkmark symbol --}}
                @else
                    {{-- Document not uploaded --}}
                    &#10008; {{-- Cross symbol --}}
                @endif
            </td>
            @if ($index !== 0)
                </tr>
            @endif
            @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

{{-- <td style="border: 1px solid black; padding: 5px; text-align: center; font-family: DejaVu Sans, sans-serif;">&#10008;</td> --}}
