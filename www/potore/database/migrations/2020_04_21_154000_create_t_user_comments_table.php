
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTUserCommentsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_user_comments", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->bigInteger('send_user_id')->unsigned();
						$table->bigInteger('target_user_id')->unsigned();
						$table->text('comment');
						$table->timestamps();
						
						
						
						
						
						
						
						
						
						$table->foreign("send_user_id")->references("id")->on("users");
						$table->foreign("target_user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [t_user_comments]--
						// ----------------------------------------------------
						// $query = DB::table("t_user_comments")
						// ->leftJoin("users","users.id", "=", "t_user_comments.send_user_id")
						// ->leftJoin("users","users.id", "=", "t_user_comments.target_user_id")
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
                Schema::dropIfExists("t_user_comments");
            }
        }
    