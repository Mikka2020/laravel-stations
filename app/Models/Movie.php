<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_url',
        'published_year',
        'is_showing',
        'description',
    ];

    public function search($keyword, $is_showing)
    {
        // キーワードがある場合
        $query = $this;
        if ($keyword) {
            // $query = $query->where('title', 'like', "%{$keyword}%");
            // タイトルまたは説明文にキーワードが含まれるものを取得
            $query = $query->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }
        // 公開ステータスがすべての場合
        if ($is_showing == null) {
            return $query->get();
        } elseif ($is_showing == 0) {
            // 公開ステータスが公開予定の場合
            return $query->where('is_showing', "0")->get();
        } elseif ($is_showing == 1) {
            // 公開ステータスが公開中の場合
            return $query->where('is_showing', '1')->get();
        }
    }
}