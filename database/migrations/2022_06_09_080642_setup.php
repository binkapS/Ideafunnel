<?php

use App\Binkap\Constant;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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

        User::create([
            'id' => Str::random(),
            'name' => "Binkap Ponmwa Shetur",
            'username' => 'Binkap',
            'status' => Constant::USER_STATUS_ADMIN,
            'email' => 'Binkap@gmail.com',
            'password' => Hash::make('Password')
        ]);
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
