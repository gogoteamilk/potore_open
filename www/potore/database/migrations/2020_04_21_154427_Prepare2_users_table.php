<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Prepare2UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('id_m_rolls')->unsigned()->nullable();
            $table->string('sex',10)->nullable();
            $table->date('birthday')->nullable();
            $table->bigInteger('id_m_areas')->unsigned()->nullable();
            $table->text('intoro')->nullable();
            $table->timestamp('lastlogin_time')->nullable();
            $table->bigInteger('id_m_fees')->unsigned()->nullable();
            $table->foreign("id_m_rolls")->references("id")->on("m_rolls");
            $table->foreign("id_m_areas")->references("id")->on("m_areas");
            $table->foreign("id_m_fees")->references("id")->on("m_fees");
            
            // ----------------------------------------------------
            // -- SELECT [t_users]--
            // ----------------------------------------------------
            // $query = DB::table("t_users")
            // ->leftJoin("m_rolls","m_rolls.roll", "=", "t_users.roll_m_rolls")
            // ->leftJoin("m_areas","m_areas.area", "=", "t_users.area_m_areas")
            // ->leftJoin("m_fee","m_fee.pattern", "=", "t_users.pattern_m_fee")
            // ->get();
            // dd($query); //For checking
            
        });
        
        //fulltext indexを張る
        DB::statement('ALTER TABLE users ADD FULLTEXT index user_fts (name, intoro)');
        DB::statement('ALTER TABLE users ADD FULLTEXT index username_fts (name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("t_users");
    }
}
