<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Daily_reportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'report/create')
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_name' => 'required',
            'lot_number' => 'required',
            'production_num' => 'required',
            'done_hour' => 'required',
            'done_minutes' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => 'アイテム名は必ず入力してください',
            'lot_number.required' => 'ロットナンバーは必ず入力してください',
            'production_num.required' => '生産枚数は必ず入力してください',
            'done_hour.required' => '生産が完了際の時間単位は必ず入力してください',
            'done_minutes.required' => '生産が完了した時間の分単位は必ず入力してください'
        ];
    }
}
