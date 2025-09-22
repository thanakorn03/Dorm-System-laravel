<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการหอพัก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">ระบบจัดการหอพัก</h1>
        <nav>
            <a href="{{ route('rooms.index') }}" class="btn btn-primary">ห้องพัก</a>
            <a href="{{ route('tenants.index') }}" class="btn btn-primary">ผู้เช่า</a>
            <a href="{{ route('invoices.index') }}" class="btn btn-primary">ใบแจ้งหนี้</a>
            <a href="{{ route('maintenance.index') }}" class="btn btn-primary">แจ้งซ่อม</a>
        </nav>
        <hr>

        {{-- ส่วนที่เอาไว้ใส่ content เฉพาะหน้า --}}
        @yield('content')

    </div>
</body>
</html>
