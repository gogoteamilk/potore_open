
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTUserLikesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_user_likes", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->bigInteger('like_target_user_id')->unsigned();
						$table->bigInteger('send_like_user_id')->unsigned();
						$table->timestamps();
						$table->unique('like_target_user_id', 'send_like_user_id');
						
						
						
						
						
						
						
						
						$table->foreign("like_target_user_id")->references("id")->on("users");
						$table->foreign("send_like_user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [t_user_likes]--
						// ----------------------------------------------------
						// $query = DB::table("t_user_likes")
						// ->leftJoin("users","users.id", "=", "t_user_likes.like_target_user_id")
						// ->leftJoin("users","users.id", "=", "t_user_likes.send_like_user_id")
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
                Schema::dropIfExists("t_user_likes");
            }
        }
    