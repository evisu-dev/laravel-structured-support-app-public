<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support\Reception;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

final class CreateController extends Controller
{
    public function __invoke(): View
    {
        // NOTE:
        // 無料テンプレート版では、Controller内で直接Modelを呼び出す簡易構成です。

        // 顧客一覧を取得（名前順）
        $customers = Customer::orderBy('name')->pluck('name', 'id');

        return view('admin.support.reception.form', [
            'customers' => $customers,
        ]);
    }
}
