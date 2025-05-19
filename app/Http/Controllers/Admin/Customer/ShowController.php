<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

final class ShowController extends Controller
{
    public function __invoke(Customer $customer): View
    {
        // NOTE:
        // 無料テンプレートでは、詳細表示はController内で直接モデルを渡しています。
        // 販売テンプレートでは、表示用DTOを通じてリレーションの整形や条件付き表示制御が導入されています。

        return view('admin.customer.show', compact('customer'));
    }
}
