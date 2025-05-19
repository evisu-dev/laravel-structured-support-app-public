@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-lg font-bold mb-4">顧客登録</h2>

        <form method="POST" action="{{ route('admin.customer.store') }}" novalidate>
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">氏名</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded p-2">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded p-2">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-semibold mb-1">電話番号</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 rounded p-2">
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="company" class="block font-semibold mb-1">会社名（任意）</label>
                <input type="text" id="company" name="company" value="{{ old('company') }}" class="w-full border border-gray-300 rounded p-2">
                @error('company') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    登録する
                </button>
            </div>
        </form>
    </div>
@endsection
