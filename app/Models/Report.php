<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'seel_id', 'area_id', 'category_id', 'description', 'recommended_action',
        'target_Date', 'img', 'status', 'receipt_confirmation', 'principal_id',  'reported_by'
    ];
    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function seel()
    {
        return $this->belongsTo(Seel::class);
    }
    public function cat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'reported_by', 'name');
    }
}
