<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Lomba;
class CreateLombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lombas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->date('tanggal_tutup');
            $table->string('poster');
            $table->timestamps();
        });
        $faker=Faker\factory::create();
        for($i=0;$i<10;$i++){
            $lomba = new Lomba();
            $lomba->nama = $faker->word;
            $lomba->deskripsi = $faker->text($maxNbChars = 200);
            $lomba->tanggal_tutup = $faker->date($format = 'Y-m-d', $max = '+5 years');
            $lomba->poster = $faker->imageUrl($width = 620, $height = 877); 
            $lomba->save();
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lombas');
    }
}