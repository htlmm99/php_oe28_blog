<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Quan điểm - Tranh luận',
            'parent_id' => 0,
            'slug' => 'quan-diem-tranh-luan',
            ],
            ['name' => 'Truyền cảm hứng',
            'parent_id' => 0,
            'slug' => 'truyen-cam-hung',
            ],
            ['name' => 'Khoa học - Công nghệ',
            'parent_id' => 0,
            'slug' => 'khoa-hoc-cong-nghe',
            ],
            ['name' => 'Thể thao',
            'parent_id' => 0,
            'slug' => 'the-thao',
            ],

        ];
        foreach ($categories as $category) {
            if (!DB::table('categories')->where('name', $category['name'])->first()) {
                DB::table('categories')->insert([
                    'name' => $category['name'],
                    'parent_id' => $category['parent_id'],
                    'slug' => $category['slug'],
                ]);
            }
        }
    }
}
