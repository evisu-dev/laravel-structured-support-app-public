@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-lg font-bold mb-4">顧客詳細</h2>

        <table class="w-full text-sm">
            <tr>
                <th class="text-left py-2 w-32">氏名</th>
                <td class="py-2">{{ $customer->name }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">メールアドレス</th>
                <td class="py-2">{{ $customer->email }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">電話番号</th>
                <td class="py-2">{{ $customer->phone }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">会社名</th>
                <td class="py-2">{{ $customer->company }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">登録日</th>
                <td class="py-2">{{ $customer->created_at->format('Y-m-d') }}</td>
            </tr>
        </table>

        <div class="mt-6 flex justify-center space-x-6">
            <a href="{{ route('admin.customer.index') }}" class="text-gray-600 underline">一覧へ戻る</a>
            <a href="{{ route('admin.customer.edit', $customer->id) }}" class="text-blue-600 underline">編集</a>
        </div>
    </div>
@endsection
