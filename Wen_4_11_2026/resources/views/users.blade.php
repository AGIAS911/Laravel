<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة المستخدمين</title>
    <style>
        body { font-family: sans-serif; padding: 30px; background-color: #f8fafc; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        th, td { padding: 12px 16px; text-align: right; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #0f172a; color: #fff; }
        tr:hover { background-color: #f1f5f9; }
        .empty { text-align: center; color: #64748b; padding: 20px; }
    </style>
</head>
<body>

    <h2>قائمة المستخدمين من قاعدة البيانات</h2>

    <table>
        <thead>
            <tr>
                <th># المعرف</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>تاريخ الإنشاء</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'غير محدد' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">لا يوجد مستخدمون حالياً في قاعدة البيانات.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>