<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->character('id',40);
            $table->text('description');//予定詳細
            $table->text('title');//予定タイトル
            $table->text('calendar_color');//カレンダー背景色
            $table->text('calendar_text_color');//カレンダー文字色
            $table->date('start_date');//開始日
            $table->time('start_time');//開始時刻
            $table->time('end_time');//終了時刻
            $table->date('end_date');//終了日
            $table->text('is_deleted');//削除フラグ
            $table->datetime('created');//データ作成日
            $table->integer('created_user_id');//データ作成者
            $table->datetime('modified');//データ更新日
            $table->integer('modified_user_id');//データ更新者
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
        Schema::dropIfExists('events');
    }
}
