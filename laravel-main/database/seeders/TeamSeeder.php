<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run()
    {
        Team::create([
            'name' => 'ফাহিম হোসেন',
            'role' => 'সিইও',
            'bio' => 'কৌশলগত পরামর্শ ও ডেলিভারি লিড।'
        ]);

        Team::create([
            'name' => 'সারা রহমান',
            'role' => 'পরামর্শক',
            'bio' => 'বাজার বিশ্লেষণ ও অপারেশনাল সাপোর্ট।'
        ]);
    }
}
