
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateMRollsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("m_rolls", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->string('name');
						$table->unique('name');
						
						
						
						
						
						
						
						



						// ----------------------------------------------------
						// -- SELECT [m_rolls]--
						// ----------------------------------------------------
						// $query = DB::table("m_rolls")
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
                Schema::dropIfExists("m_rolls");
            }
        }
    