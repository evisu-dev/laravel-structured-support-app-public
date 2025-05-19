@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-lg font-bold mb-4">顧客一覧</h2>

        @if ($customers->isEmpty())
            <p class="text-gray-600">顧客情報がまだ登録されていません。</p>
        @else
            <table class="w-full border border-gray-300 text-sm">
                <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">氏名</th>
                    <th class="p-2 border">メールアドレス</th>
                    <th class="p-2 border">電話番号</th>
                    <th class="p-2 border">会社名</th>
                    <th class="p-2 border">登録日</th>
                    <th class="p-2 border" colspan="2">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr class="border-t">
                        <td class="p-2 border">
                            <a href="{{ route('admin.customer.show', $customer->id) }}" class="text-gray-600 underline">{{ $customer->name }}</a>
                        </td>
                        <td class="p-2 border">{{ $customer->email }}</td>
                        <td class="p-2 border">{{ $customer->phone }}</td>
                        <td class="p-2 border">{{ $customer->company }}</td>
                        <td class="p-2 border">{{ $customer->created_at->format('Y-m-d') }}</td>
                        <td class="p-2 border text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.customer.edit', $customer->id) }}" class="text-blue-600 underline">編集</a>
                            </div>
                        </td>
                        <td class="p-2 border text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <form method="POST" action="{{ route('admin.customer.destroy', $customer->id) }}"
                                      onsubmit="return confirm('本当に削除しますか？');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 underline">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        @endif
    </div>
@endsection
