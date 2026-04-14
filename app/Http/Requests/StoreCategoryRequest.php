<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Only admin can create categories
        return Auth::check() && Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug'],
            'description' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'string', 'max:100'],
            'color' => ['nullable', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'حقل اسم الفئة مطلوب.',
            'name.max' => 'يجب ألا يزيد اسم الفئة عن 255 حرف.',
            'name.unique' => 'اسم الفئة موجود بالفعل.',
            'slug.unique' => 'الرابط موجود بالفعل.',
            'description.max' => 'يجب ألا يزيد الوصف عن 1000 حرف.',
            'icon.max' => 'يجب ألا يزيد رمز الأيقونة عن 100 حرف.',
            'color.regex' => 'اللون يجب أن يكون بصيغة hex صحيحة (مثال: #FF0000).',
            'image.image' => 'ملف الصورة يجب أن يكون صورة.',
            'image.mimes' => 'صورة الفئة يجب أن تكون من نوع: jpeg, png, jpg, gif.',
            'image.max' => 'حجم صورة الفئة يجب ألا يزيد عن 2 ميجابايت.',
            'sort_order.integer' => 'ترتيب الفرز يجب أن يكون رقماً.',
            'sort_order.min' => 'ترتيب الفرز يجب أن يكون 0 أو أكثر.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'اسم الفئة',
            'slug' => 'الرابط',
            'description' => 'الوصف',
            'icon' => 'الأيقونة',
            'color' => 'اللون',
            'image' => 'الصورة',
            'is_active' => 'نشط',
            'sort_order' => 'ترتيب الفرز',
        ];
    }
}
