
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTPhotoLikesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_photo_likes", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->bigInteger('id_t_photos')->unsigned();
						$table->bigInteger('send_like_user_id')->unsigned();
						$table->timestamps();
						$table->unique('id_t_photos', 'send_like_user_id');
						
						
						
						
						
						
						
						
						$table->foreign("id_t_photos")->references("id")->on("t_photos");
						$table->foreign("send_like_user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [t_photo_likes]--
						// ----------------------------------------------------
						// $query = DB::table("t_photo_likes")
						// ->leftJoin("t_photos","t_photos.id", "=", "t_photo_likes.id_t_photos")
						// ->leftJoin("users","users.id", "=", "t_photo_likes.send_like_user_id")
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
                Schema::dropIfExists("t_photo_likes");
            }
        }
    