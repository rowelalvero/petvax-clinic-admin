<?php

namespace Modules\NotificationTemplate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationTemplateContentMapping extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notification_template_content_mapping';

    protected $fillable = [
        'template_id',
        'template_detail',
        'mail_template_detail',
        'notification_message',
        'notification_link',
        'language',
        'subject',
        'mail_subject',
        'status',
        'user_type'
    ];
    protected $casts = [
        'template_id' => 'integer',
        'status' => 'integer',
      ];

    protected static function newFactory()
    {
        return \Modules\NotificationTemplate\Database\factories\NotificationTemplateContentMappingFactory::new();
    }

    public function template()
    {
        return $this->belongsTo(NotificationTemplate::class, 'template_id', 'id');
    }
}
