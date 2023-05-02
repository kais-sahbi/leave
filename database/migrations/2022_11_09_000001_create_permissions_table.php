<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');

            $table->text('name');

            $table->foreign('role_id') //on va utliser belongto
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            // foreign matkdm kin bl unsignedBigInteger
            $table->timestamps();
        });

        /* normlment y3awth
         public function role(){
        return $this->belongsTo(Role::class);//all permission belong to 1role
    }*/
    /*    Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
