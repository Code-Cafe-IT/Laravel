
<html>
<head>
    <style>
        /* CSS cho bảng */
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>               
                <th>Tình Trạng</th>
                <th>Thời gian tạo</th>
                <th>Tên sản phẩm</th>
                <th>Chiều cao</th>
                <th>Chiều rộng</th>
                <th>Chiều dài</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data['data'] as $item)
        <tr>
                    <td> {{ $item['attributes']['status']['attribute_code'] }}</td>
                    <td> {{ $item['created_at'] }}</td>
                    <td> {{ $item['attributes']['name']['value'] }}</td>
                    <td> {{ $item['attributes']['product_height']['value'] }}</td>
                    <td> {{ $item['attributes']['product_width']['value'] }}</td>
                    <td> {{ $item['attributes']['product_length']['value'] }}</td>
                    
        </tr>
            @endforeach
        </tbody>
       
    </table>
    <p>Total: {{ $data['paging']['total'] }}</p>

</body>
</html>


