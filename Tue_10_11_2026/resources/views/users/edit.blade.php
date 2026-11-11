<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل بيانات المستخدم</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800 border-b pb-2">تعديل بيانات: {{ $user->name }}</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">الاسم الكامل:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-yellow-200 outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">البريد الإلكتروني:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-yellow-200 outline-none" required>
            </div>

            <div class="border-t pt-4 mt-4">
                <span class="text-xs text-gray-500 block mb-2">* اترك حقول كلمة المرور فارغة إذا كنت لا تريد تغييرها</span>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">كلمة المرور الجديدة:</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2 focus:ring focus:ring-yellow-200 outline-none">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-1">تأكيد كلمة المرور الجديدة:</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2 focus:ring focus:ring-yellow-200 outline-none">
                </div>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition">
                    تحديث البيانات
                </button>
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:underline">
                    إلغاء والعودة
                </a>
            </div>
        </form>
    </div>
</body>
</html>