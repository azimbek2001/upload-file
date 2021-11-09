<?php

namespace App\Models;

use App\Services\Interfaces\MediaConfigInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model implements MediaConfigInterface
{
    protected $fillable = [
        'client_name',
        'original_name',
        'disk',
        'mime_type',
        'thumbs',
        'entity_type',
        'entity_id',
        'params',
    ];

    private $entityId = 1;
    private $entityType = "product";
    private $sizes = [ 1000 , 500 , 200 , 150];

    use HasFactory;

    public function getEntityId(): int
    {
        return $this->entityId;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function getClientName(): string
    {
        return $this->clientName;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getSizes(): array
    {
        return $this->sizes;
    }

    public function setParams($model, $items): void
    {
        $this->setAttribute('params', json_encode($items));
    }
}
