<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Process_registrationRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path() == 'process/create')
        {
            return true;
        }else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'lot_number' => 'required',
            'item_name' => 'required',
            'start_date' => 'required',
            'start_hour' => 'required',
            'start_minutes' => 'required',
            'end_date' => 'required',
            'end_hour' => 'required',
            'end_minutes' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lot_number.required' => 'ロットナンバーは必ず入力して下さい。',
            'item_name.required' => 'アイテム名は必ず入力して下さい。',
            'start_date.required' => '着手予定日は必ず入力して下さい。',
            'start_hour.required' => '着手予定時間は必ず入力して下さい。',
            'start_minutes.required' => '着手予定時間は必ず入力して下さい。',
            'end_date.required' => '完了予定日は必ず入力して下さい。',
            'end_hour.required' => '完了予定時間は必ず入力して下さい。',
            'end_minutes.required' => '完了予定時間は必ず入力して下さい。',
        ];
    }
}
