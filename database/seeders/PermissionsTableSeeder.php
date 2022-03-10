<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_access',
            ],
            [
                'id'    => 11,
                'title' => 'user_create',
            ],
            [
                'id'    => 12,
                'title' => 'user_edit',
            ],
            [
                'id'    => 13,
                'title' => 'user_show',
            ],
            [
                'id'    => 14,
                'title' => 'user_delete',
            ],
            [
                'id'    => 15,
                'title' => 'user_access',
            ],
            [
                'id'    => 16,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 18,
                'title' => 'blogsmenu_access',
            ],
            [
                'id'    => 19,
                'title' => 'audio_menu_access',
            ],
            [
                'id'    => 20,
                'title' => 'books_menu_access',
            ],
            [
                'id'    => 21,
                'title' => 'audio_books_menu_access',
            ],
            [
                'id'    => 22,
                'title' => 'questions_menu_access',
            ],
            [
                'id'    => 23,
                'title' => 'tafsir_menu_access',
            ],
            [
                'id'    => 24,
                'title' => 'persons_menu_access',
            ],
            [
                'id'    => 25,
                'title' => 'others_menu_access',
            ],
            [
                'id'    => 26,
                'title' => 'category_create',
            ],
            [
                'id'    => 27,
                'title' => 'category_edit',
            ],
            [
                'id'    => 28,
                'title' => 'category_show',
            ],
            [
                'id'    => 29,
                'title' => 'category_access',
            ],
            [
                'id'    => 30,
                'title' => 'person_create',
            ],
            [
                'id'    => 31,
                'title' => 'person_edit',
            ],
            [
                'id'    => 32,
                'title' => 'person_show',
            ],
            [
                'id'    => 33,
                'title' => 'person_delete',
            ],
            [
                'id'    => 34,
                'title' => 'person_access',
            ],
            [
                'id'    => 35,
                'title' => 'blog_create',
            ],
            [
                'id'    => 36,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 37,
                'title' => 'blog_show',
            ],
            [
                'id'    => 38,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 39,
                'title' => 'blog_access',
            ],
            [
                'id'    => 40,
                'title' => 'audio_create',
            ],
            [
                'id'    => 41,
                'title' => 'audio_edit',
            ],
            [
                'id'    => 42,
                'title' => 'audio_show',
            ],
            [
                'id'    => 43,
                'title' => 'audio_delete',
            ],
            [
                'id'    => 44,
                'title' => 'audio_access',
            ],
            [
                'id'    => 45,
                'title' => 'book_create',
            ],
            [
                'id'    => 46,
                'title' => 'book_edit',
            ],
            [
                'id'    => 47,
                'title' => 'book_show',
            ],
            [
                'id'    => 48,
                'title' => 'book_delete',
            ],
            [
                'id'    => 49,
                'title' => 'book_access',
            ],
            [
                'id'    => 50,
                'title' => 'audio_book_create',
            ],
            [
                'id'    => 51,
                'title' => 'audio_book_edit',
            ],
            [
                'id'    => 52,
                'title' => 'audio_book_show',
            ],
            [
                'id'    => 53,
                'title' => 'audio_book_delete',
            ],
            [
                'id'    => 54,
                'title' => 'audio_book_access',
            ],
            [
                'id'    => 55,
                'title' => 'surah_create',
            ],
            [
                'id'    => 56,
                'title' => 'surah_edit',
            ],
            [
                'id'    => 57,
                'title' => 'surah_show',
            ],
            [
                'id'    => 58,
                'title' => 'surah_delete',
            ],
            [
                'id'    => 59,
                'title' => 'surah_access',
            ],
            [
                'id'    => 60,
                'title' => 'aya_create',
            ],
            [
                'id'    => 61,
                'title' => 'aya_edit',
            ],
            [
                'id'    => 62,
                'title' => 'aya_show',
            ],
            [
                'id'    => 63,
                'title' => 'aya_delete',
            ],
            [
                'id'    => 64,
                'title' => 'aya_access',
            ],
            [
                'id'    => 65,
                'title' => 'question_create',
            ],
            [
                'id'    => 66,
                'title' => 'question_edit',
            ],
            [
                'id'    => 67,
                'title' => 'question_show',
            ],
            [
                'id'    => 68,
                'title' => 'question_delete',
            ],
            [
                'id'    => 69,
                'title' => 'question_access',
            ],
            [
                'id'    => 70,
                'title' => 'page_create',
            ],
            [
                'id'    => 71,
                'title' => 'page_edit',
            ],
            [
                'id'    => 72,
                'title' => 'page_show',
            ],
            [
                'id'    => 73,
                'title' => 'page_delete',
            ],
            [
                'id'    => 74,
                'title' => 'page_access',
            ],
            [
                'id'    => 75,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
