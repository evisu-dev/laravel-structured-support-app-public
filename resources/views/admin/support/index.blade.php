@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-lg font-bold mb-4">対応情報一覧</h2>

        @if ($supports->isEmpty())
            <p class="text-gray-600">対応情報がまだ登録されていません。</p>
        @else
            <table class="w-full border border-gray-300 text-sm">
                <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">顧客名</th>
                    <th class="p-2 border">件名</th>
                    <th class="p-2 border">ステータス</th>
                    <th class="p-2 border">登録日</th>
                    <th class="p-2 border" colspan="2">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($supports as $support)
                    <tr class="border-t">
                        <td class="p-2 border">{{ $support->customer->name }}</td>
                        <td class="p-2 border">{{ $support->subject }}</td>
                        <td class="p-2 border text-center">
                            <span class="px-2 py-1 text-xs rounded bg-gray-100">
                                {{ $support->status->label() }}
                            </span>
                        </td>
                        <td class="p-2 border">{{ $support->created_at->format('Y-m-d') }}</td>
                        <td class="p-2 border text-center">
                            <a href="{{ route('admin.support.show', $support->id) }}" class="text-blue-600 underline">詳細</a>
                        </td>
                        <td class="p-2 border text-center">
                            <a href="{{ route('admin.support.edit', $support->id) }}" class="text-green-600 underline">編集</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $supports->links() }}
            </div>
        @endif
    </div>
@endsection
