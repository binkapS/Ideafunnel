<?php

use App\Binkap\Constant;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $array = [
            'Technology',
            'Bussiness',
            'Investment',
            'Gadgets and Accessories',
            'Cars',
            'Sports'
        ];
        foreach ($array as $item) {
            Category::create([
                'id' => Str::random(Constant::CATEGORY_ID_LENGTH),
                'author' => 'admin',
                'name' => $item
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
