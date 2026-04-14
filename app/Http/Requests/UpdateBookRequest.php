<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Only authenticated users can update books
        if (!Auth::check()) {
            return false;
        }

        $book = $this->route('book');
        
        // Admin can update any book
        if (Auth::user()->hasRole('admin')) {
            return true;
        }

        // Regular users can only update their own books
        return Auth::id() === $book->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $book = $this->route('book');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('books', 'slug')->ignore($book->id)],
            'description' => ['nullable', 'string', 'max:2000'],
            'content' => ['nullable', 'string'],
            'author_name' => ['required', 'string', 'max:255'],
            'author_email' => ['nullable', 'email', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:20', Rule::unique('books', 'isbn')->ignore($book->id)],
            'publisher' => ['nullable', 'string', 'max:255'],
            'pages' => ['nullable', 'integer', 'min:1', 'max:10000'],
            'language' => ['required', 'string', 'in:en,ar'],
            'published_date' => ['nullable', 'date', 'before:today'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'file_path' => ['nullable', 'file', 'mimes:pdf,epub,mobi', 'max:10240'],
            'price' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'is_featured' => ['boolean'],
            'is_published' => ['boolean'],
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
            'title.required' => 'حقل العنوان مطلوب.',
            'title.max' => 'يجب ألا يزيد العنوان عن 255 حرف.',
            'author_name.required' => 'حقل اسم المؤلف مطلوب.',
            'author_name.max' => 'يجب ألا يزيد اسم المؤلف عن 255 حرف.',
            'author_email.email' => 'يجب أن يكون البريد الإلكتروني صحيحاً.',
            'isbn.unique' => 'رقم ISBN موجود بالفعل.',
            'pages.integer' => 'عدد الصفحات يجب أن يكون رقماً.',
            'pages.min' => 'يجب أن يكون عدد الصفحات على الأقل 1.',
            'language.required' => 'حقل اللغة مطلوب.',
            'language.in' => 'اللغة يجب أن تكون إما عربي أو إنجليزي.',
            'published_date.before' => 'تاريخ النشر يجب أن يكون في الماضي.',
            'cover_image.image' => 'ملف الغلاف يجب أن يكون صورة.',
            'cover_image.mimes' => 'صورة الغلاف يجب أن تكون من نوع: jpeg, png, jpg, gif.',
            'cover_image.max' => 'حجم صورة الغلاف يجب ألا يزيد عن 2 ميجابايت.',
            'file_path.file' => 'ملف الكتاب يجب أن يكون ملفاً.',
            'file_path.mimes' => 'ملف الكتاب يجب أن يكون من نوع: pdf, epub, mobi.',
            'file_path.max' => 'حجم ملف الكتاب يجب ألا يزيد عن 10 ميجابايت.',
            'price.numeric' => 'السعر يجب أن يكون رقماً.',
            'price.min' => 'السعر يجب أن يكون 0 أو أكثر.',
            'category_id.exists' => 'الفئة المختارة غير موجودة.',
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
            'title' => 'العنوان',
            'slug' => 'الرابط',
            'description' => 'الوصف',
            'content' => 'المحتوى',
            'author_name' => 'اسم المؤلف',
            'author_email' => 'بريد المؤلف',
            'isbn' => 'رقم ISBN',
            'publisher' => 'الناشر',
            'pages' => 'عدد الصفحات',
            'language' => 'اللغة',
            'published_date' => 'تاريخ النشر',
            'cover_image' => 'صورة الغلاف',
            'file_path' => 'ملف الكتاب',
            'price' => 'السعر',
            'category_id' => 'الفئة',
            'is_featured' => 'مميز',
            'is_published' => 'منشور',
        ];
    }
}
