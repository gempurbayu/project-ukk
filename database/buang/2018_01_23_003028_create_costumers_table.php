    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateCostumersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('customers', function (Blueprint $table) {
                $table->increments('id');
                
                $table->string('name');
                $table->string('address');
                $table->string('phone');
                $table->enum('gender', ['Pria','Wanita']);
                $table->timestamps();

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('customers');
        }
    }
