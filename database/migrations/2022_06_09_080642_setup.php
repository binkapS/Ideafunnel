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
        $admins = [
            [
                'name' => "Binkap S",
                'username' => "Binkap",
                'status' => Constant::USER_STATUS_ADMIN,
                'email' => "webmaster@ideafunnel.com.ng",
                'password' => "Binkatuponny12345#@"
            ],
            [
                'name' => "Lamido Bolchang",
                'username' => "Bolchang",
                'status' => Constant::USER_STATUS_ADMIN,
                'email' => "lamido@ideafunnel.com.ng",
                'password' => "Lamido123#"
            ]
        ];
        foreach ($admins as $admin) {
            User::create([
                'id' => ($admin['username'] == "Binkap") ? Constant::USER_BINKAP_S :  Str::random(Constant::USER_ID_LENGTH),
                'name' => $admin['name'],
                'username' => $admin['username'],
                'status' => $admin['status'],
                'email' => $admin['email'],
                'password' => Hash::make($admin['password'])
            ]);
        }

        Category::create([
            'id' => Constant::CATEGORY_UNCATEGORISED,
            'name' => "Uncategorized",
            'author' => Constant::USER_BINKAP_S
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
