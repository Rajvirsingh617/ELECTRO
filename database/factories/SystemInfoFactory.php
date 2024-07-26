<?php
// database/factories/SystemInfoFactory.php

namespace Database\Factories;

use App\Models\SystemInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SystemInfoFactory extends Factory
{
    protected $model = SystemInfo::class;

    public function definition()
    {
        return [
            'meta_name' => '',
            'meta_value' =>'',
        ];
    }
}
