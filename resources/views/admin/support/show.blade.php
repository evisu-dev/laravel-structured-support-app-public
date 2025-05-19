@php use App\Enums\SupportStatusType; @endphp

@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-lg font-bold mb-4">対応詳細</h2>

        <table class="w-full text-sm mb-4">
            <tr>
                <th class="py-2 text-left w-32">顧客名</th>
                <td class="py-2">{{ $support->customer->name }}</td>
            </tr>
            <tr>
                <th class="py-2 text-left">件名</th>
                <td class="py-2">{{ $support->subject }}</td>
            </tr>
            <tr>
                <th class="py-2 text-left">内容</th>
                <td class="py-2 whitespace-pre-wrap">{{ $support->description }}</td>
            </tr>
            <tr>
                <th class="py-2 text-left">ステータス</th>
                <td class="py-2">
                    <span class="inline-block px-2 py-1 text-xs rounded bg-gray-100">
                        {{ $support->status->label() }}
                    </span>
                </td>
            </tr>
            <tr>
                <th class="py-2 text-left">登録日</th>
                <td class="py-2">{{ $support->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>

        @if ($support->status === SupportStatusType::RECEPTION)
            <form method="POST" action="{{ route('admin.support.complete', $support->id) }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                    対応完了にする
                </button>
            </form>
        @endif

        <div class="mt-6 flex justify-center space-x-6">
            <a href="{{ route('admin.support.index') }}" class="text-gray-600 underline">一覧へ戻る</a>
            <a href="{{ route('admin.support.edit', $support->id) }}" class="text-blue-600 underline">編集</a>
        </div>
    </div>
@endsection
