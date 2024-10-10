<?php

namespace Database\Seeders;

use App\Models\Competex\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create(['code' => 'code1', 'name' => 'Course 1', 'description' => 'Lorem ipsum dolor sit amet. Ad repellendus rerum sed tempora rerum ea dolor quia eum laboriosam repudiandae ad ipsum quam. Ex enim quae rem autem aperiam et impedit odio et sint excepturi rem libero assumenda aut totam aperiam qui voluptate voluptatem. Ut tempore nostrum et officiis nihil et repudiandae eaque qui quas quis et dolores esse sit magnam dolore ex sunt quis. Ex maxime incidunt vel ratione molestias et dicta velit est enim vitae est soluta aliquam?', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']); //
        Course::create(['code' => 'code2', 'name' => 'Course 2', 'description' => 'Lorem ipsum dolor sit amet. Ad repellendus rerum sed tempora rerum ea dolor quia eum laboriosam repudiandae ad ipsum quam. Ex enim quae rem autem aperiam et impedit odio et sint excepturi rem libero assumenda aut totam aperiam qui voluptate voluptatem. Ut tempore nostrum et officiis nihil et repudiandae eaque qui quas quis et dolores esse sit magnam dolore ex sunt quis. Ex maxime incidunt vel ratione molestias et dicta velit est enim vitae est soluta aliquam?', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']); //
        Course::create(['code' => 'code3', 'name' => 'Course 3', 'description' => 'Lorem ipsum dolor sit amet. Ad repellendus rerum sed tempora rerum ea dolor quia eum laboriosam repudiandae ad ipsum quam. Ex enim quae rem autem aperiam et impedit odio et sint excepturi rem libero assumenda aut totam aperiam qui voluptate voluptatem. Ut tempore nostrum et officiis nihil et repudiandae eaque qui quas quis et dolores esse sit magnam dolore ex sunt quis. Ex maxime incidunt vel ratione molestias et dicta velit est enim vitae est soluta aliquam?', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']); //
        // Course::create(['code' => 'code4', 'name' => 'Course 4', 'description' => 'Lorem ipsum dolor sit amet. Ad repellendus rerum sed tempora rerum ea dolor quia eum laboriosam repudiandae ad ipsum quam. Ex enim quae rem autem aperiam et impedit odio et sint excepturi rem libero assumenda aut totam aperiam qui voluptate voluptatem. Ut tempore nostrum et officiis nihil et repudiandae eaque qui quas quis et dolores esse sit magnam dolore ex sunt quis. Ex maxime incidunt vel ratione molestias et dicta velit est enim vitae est soluta aliquam?', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
    }
}
