@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-lg font-bold mb-4">顧客情報の編集</h2>

        <form method="POST" action="{{ route('admin.customer.update', $customer->id) }}" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">氏名</label>
                <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" required class="w-full border border-gray-300 rounded p-2">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border border-gray-300 rounded p-2">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-semibold mb-1">電話番号</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full border border-gray-300 rounded p-2">
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="company" class="block font-semibold mb-1">会社名</label>
                <input type="text" id="company" name="company" value="{{ old('company', $customer->company) }}" class="w-full border border-gray-300 rounded p-2">
                @error('company') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- 更新ボタン -->
            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    更新する
                </button>
            </div>
        </form>
    </div>
@endsection
