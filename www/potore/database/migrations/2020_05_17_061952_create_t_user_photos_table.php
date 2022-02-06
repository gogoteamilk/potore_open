
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTUserPhotosTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_user_photos", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->bigInteger('id_t_photos')->unsigned();
						$table->bigInteger('id_users')->unsigned();
						$table->timestamps();
						
						
						
						
						
						
						
						
						
						$table->foreign("id_t_photos")->references("id")->on("t_photos");
						$table->foreign("id_users")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [t_user_photos]--
						// ----------------------------------------------------
						// $query = DB::table("t_user_photos")
						// ->leftJoin("t_photos","t_photos.id", "=", "t_user_photos.id_t_photos")
						// ->leftJoin("users","users.id", "=", "t_user_photos.id_users")
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
                Schema::dropIfExists("t_user_photos");
            }
        }
    