
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTTagsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("t_tags", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->string('tag_name',30);
						$table->timestamps();
						$table->unique('tag_name');
						
						
						
						
						
						
						
						



						// ----------------------------------------------------
						// -- SELECT [t_tags]--
						// ----------------------------------------------------
						// $query = DB::table("t_tags")
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
                Schema::dropIfExists("t_tags");
            }
        }
    