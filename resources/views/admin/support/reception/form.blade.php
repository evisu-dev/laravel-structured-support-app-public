@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-xl font-bold mb-4">対応受付フォーム</h2>

        <form method="POST" action="{{ route('admin.support.reception.store') }}" novalidate>
            @csrf

            <!-- 顧客選択 -->
            <div class="mb-4">
                <label for="customer_id" class="block font-semibold mb-1">顧客</label>
                <select name="customer_id" id="customer_id" required class="w-full border border-gray-300 rounded p-2">
                    <option value="">-- 顧客を選択 --</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 件名 -->
            <div class="mb-4">
                <label for="subject" class="block font-semibold mb-1">件名</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required class="w-full border border-gray-300 rounded p-2">
                @error('subject')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 内容 -->
            <div class="mb-4">
                <label for="description" class="block font-semibold mb-1">内容</label>
                <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded p-2">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 登録ボタン -->
            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    登録する
                </button>
            </div>
        </form>
    </div>
@endsection
