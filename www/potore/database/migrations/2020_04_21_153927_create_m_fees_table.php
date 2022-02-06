
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateMFeesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("m_fees", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->string('name');
						$table->unique('name');
						
						
						
						
						
						
						
						



						// ----------------------------------------------------
						// -- SELECT [m_fees]--
						// ----------------------------------------------------
						// $query = DB::table("m_fees")
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
                Schema::dropIfExists("m_fees");
            }
        }
    