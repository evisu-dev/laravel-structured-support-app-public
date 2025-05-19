<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class CreateController extends Controller
{
    public function __invoke(): View
    {
        // NOTE:
        // 無料テンプレートでは、新規登録画面の表示処理をController内で完結させています。
        // 販売テンプレートでは、初期値設定や権限分岐などをService層で制御するケースがあります。

        return view('admin.customer.form');
    }
}
