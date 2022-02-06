
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTCommentLikesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_comment_likes", function (Blueprint $table) {

						$table->bigInteger('id')->nullable();
						$table->bigInteger('id_t_user_comments')->unsigned()->nullable();
						$table->bigInteger('send_user_id')->unsigned();
						$table->timestamps();
						$table->unique('id_t_user_comments', 'send_user_id');
						
						
						
						
						
						
						
						
						$table->foreign("id_t_user_comments")->references("id")->on("t_user_comments");
						$table->foreign("send_user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [t_comment_likes]--
						// ----------------------------------------------------
						// $query = DB::table("t_comment_likes")
						// ->leftJoin("t_user_comments","t_user_comments.id", "=", "t_comment_likes.id_t_user_bbs")
						// ->leftJoin("users","users.id", "=", "t_comment_likes.send_user_id")
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
                Schema::dropIfExists("t_comment_likes");
            }
        }
    