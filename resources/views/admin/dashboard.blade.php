<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - Admin Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f4f4f4; }
        h2 { color: #007bff; }
        form { background: #fff; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc; }
        button { padding: 8px 16px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .card { background: #fff; padding: 15px; border-radius: 8px; margin-bottom: 10px; }
        .delete-btn { background: red; margin-left: 10px; }
    </style>
</head>
<body>

    <h1>لوحة تحكم الإدمن</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- إضافة خدمة -->
    <section>
        <h2>إضافة خدمة جديدة</h2>
        <form action="{{ route('dashboard.services.add') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="عنوان الخدمة" required>
            <textarea name="description" rows="3" placeholder="وصف الخدمة" required></textarea>
            <button type="submit">إضافة الخدمة</button>
        </form>

        <h3>الخدمات الحالية</h3>
        @foreach($services as $service)
            <div class="card">
                <strong>{{ $service->title }}</strong>
                <p>{{ $service->description }}</p>
                <form action="{{ url('dashboard/services/delete/'.$service->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn" type="submit">حذف</button>
                </form>
            </div>
        @endforeach
    </section>

    <!-- إضافة مشروع -->
    <section>
        <h2>إضافة مشروع جديد</h2>
        <form action="{{ route('dashboard.projects.add') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="عنوان المشروع" required>
            <textarea name="description" rows="3" placeholder="وصف المشروع" required></textarea>
            <button type="submit">إضافة المشروع</button>
        </form>

        <h3>المشاريع الحالية</h3>
        @foreach($projects as $project)
            <div class="card">
                <strong>{{ $project->title }}</strong>
                <p>{{ $project->description }}</p>
                <form action="{{ url('dashboard/projects/delete/'.$project->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn" type="submit">حذف</button>
                </form>
            </div>
        @endforeach
    </section>

</body>
</html>
