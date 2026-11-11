<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المستخدمين</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">قائمة المستخدمين</h1>
                <p class="text-gray-500 text-sm mt-1">عرض وإدارة الحسابات المسجلة في النظام</p>
            </div>
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                إضافة مستخدم جديد +
            </a>
        </div>

        {{-- رسالة النجاح التنبيهية --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="p-3 border">#</th>
                        <th class="p-3 border">الاسم</th>
                        <th class="p-3 border">البريد الإلكتروني</th>
                        <th class="p-3 border">تاريخ التسجيل</th>
                        <th class="p-3 border text-center">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 border text-gray-500">{{ $user->id }}</td>
                            <td class="p-3 border font-semibold text-gray-800">{{ $user->name }}</td>
                            <td class="p-3 border text-gray-600">{{ $user->email }}</td>
                            <td class="p-3 border text-sm text-gray-500">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="p-3 border">
                                <div class="flex justify-center items-center gap-2">
                                    {{-- زر عرض التفاصيل --}}
                                    <a href="{{ route('users.show', $user->id) }}" class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-700 transition">
                                        عرض
                                    </a>

                                    {{-- زر التعديل --}}
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 transition">
                                        تعديل
                                    </a>

                                    {{-- فورم الحذف --}}
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم نهائياً؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition">
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">لا يوجد مستخدمون مسجلون حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- الترقيم (Pagination) --}}
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</body>
</html>