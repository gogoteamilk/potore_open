
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTPhotosTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_photos", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->string('photo'); //写真URL
						$table->string('title')->nullable();
						$table->string('comment')->nullable();
						$table->integer('order_number')->nullable();
						$table->bigInteger('post_user_id')->unsigned();
						$table->timestamps();
						
						
						
						
						
						
						
						
						
						$table->foreign("post_user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [t_photos]--
						// ----------------------------------------------------
						// $query = DB::table("t_photos")
						// ->leftJoin("users","users.id", "=", "t_photos.post_user_id")
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
                Schema::dropIfExists("t_photos");
            }
        }
    