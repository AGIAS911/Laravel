<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h2 class="text-xl font-bold text-gray-800">Account Details</h2>
            <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full">ID #{{ $user->id }}</span>
        </div>

        <div class="space-y-4 text-gray-700">
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">Full Name:</span>
                <span>{{ $user->name }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">Email Address:</span>
                <span>{{ $user->email }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">Seller Account:</span>
                <span>
                    @if($user->seller)
                        <span class="text-green-600 font-bold">Yes (Store: {{ $user->seller->store_name }})</span>
                    @else
                        <span class="text-gray-400">Regular Buyer</span>
                    @endif
                </span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">Created At:</span>
                <span>{{ $user->created_at->format('Y-m-d H:i') }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-semibold">Last Updated:</span>
                <span>{{ $user->updated_at->format('Y-m-d H:i') }}</span>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                Edit Account
            </a>
            <a href="{{ route('users.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                Back to List
            </a>
        </div>

    </div>
</body>
</html>