<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class TableProfileSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',255);
            $table->text('alamat');
            $table->string('no_telp',20);
            $table->text('photo');
            $table->text('akademik')->nullable();
            $table->text('judul_fasilitas_1')->nullable();
            $table->text('desc_fasilitas_1')->nullable();
            $table->text('pic_fasilitas_1')->nullable();
            $table->text('judul_fasilitas_2')->nullable();
            $table->text('desc_fasilitas_2')->nullable();
            $table->text('pic_fasilitas_2')->nullable();
            $table->text('judul_fasilitas_3')->nullable();
            $table->text('desc_fasilitas_3')->nullable();
            $table->text('pic_fasilitas_3')->nullable();
            $table->timestamps();
 
            $table->engine = 'InnoDB';
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_sekolah', function (Blueprint $table) {
            //
        });
    }
}