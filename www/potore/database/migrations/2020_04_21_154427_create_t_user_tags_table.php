
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTUserTagsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_user_tags", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->bigInteger('target_user_id')->unsigned();
						$table->bigInteger('id_t_user_tags')->unsigned();
						$table->timestamps();
						$table->unique('target_user_id', 'id_t_user_tags');
						
						
						
						
						
						
						
						
						$table->foreign("target_user_id")->references("id")->on("users");
						$table->foreign("id_t_user_tags")->references("id")->on("t_tags");



						// ----------------------------------------------------
						// -- SELECT [t_user_tags]--
						// ----------------------------------------------------
						// $query = DB::table("t_user_tags")
						// ->leftJoin("users","users.id", "=", "t_user_tags.target_user_id")
						// ->leftJoin("t_tags","t_tags.id", "=", "t_user_tags.id_t_user_tags")
						// ->get();
						// dd($query); //For checking



                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("t_user_tags");
            }
        }
    