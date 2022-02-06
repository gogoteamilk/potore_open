
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTActivityAreasTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_activity_areas", function (Blueprint $table) {


                    $table->bigIncrements('id');
                    $table->bigInteger('id_users')->unsigned();
                    $table->bigInteger('id_areas')->unsigned();
                    $table->timestamps();
                    $table->unique(['id_users', 'id_areas']);
                    
                    
                    
                    
                    
                    
                    
                    
                    $table->foreign("id_users")->references("id")->on("users");
                    $table->foreign("id_areas")->references("id")->on("m_areas");
						
						



						// ----------------------------------------------------
						// -- SELECT [t_activity_areas]--
						// ----------------------------------------------------
						// $query = DB::table("t_activity_areas")
						// ->leftJoin("users","users.id", "=", "t_activity_areas.id_users")
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
                Schema::dropIfExists("t_activity_areas");
            }
        }
    