
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
                <th>Id</th>
                <th>Tạo lúc</th>
                <th>Name</th>
                <th>Giá</th>
                <th>Tồn Kho</th>
                <th>Cập Nhật Tồn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['data'] as $item)
                <tr>
                    <td>{{ $item['product_id'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['inventory']['quantity_available'] }}</td>
                    <td><a href="{{ route('post-data') }}"><button type="button" class="btn btn-success">Update</button></a></td>
                </tr>

            @endforeach
        </tbody>
    </table>
    
</body>
</html>

