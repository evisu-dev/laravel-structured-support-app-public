<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

final class SupportCustomerRequest extends FormRequest
{
    // NOTE:
    // 無料テンプレートでは、バリデーションルールはFormRequest内に直接定義し、
    // 登録・更新の両方で共通化しています。
    // 販売テンプレートでは、バリデーションの分離（Create用/Update用）や、
    // 条件付きバリデーション・独自Ruleクラス導入も行っています。

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['nullable', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
        ];
    }
}
