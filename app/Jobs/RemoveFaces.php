<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\Image as VisionImage;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Fit;

class RemoveFaces implements ShouldQueue
{
    use Dispatchable, Queueable;

    private $image_id;

    public function __construct($image_id)
    {
        $this->image_id = $image_id;
    }
    
    public function handle(): void
    {
        $i = Image::find($this->image_id);
        
        if (!$i) return;
        $src = storage_path('app/public/' . $i->path);

        if (!file_exists($src)) return;
        $imageContent = file_get_contents($src);
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        
        $client = new ImageAnnotatorClient();
        
        $visionImage = new VisionImage([
        'content' => $imageContent
        ]);
        
        $feature = new Feature();
        $feature->setType(Type::FACE_DETECTION);
        
        $request = new AnnotateImageRequest();
        $request->setImage($visionImage);
        $request->setFeatures([$feature]);
        
        $batch = new BatchAnnotateImagesRequest();
        $batch->setRequests([$request]);
        
        $response = $client->batchAnnotateImages($batch)->getResponses()[0];
        
        $faces = $response->getFaceAnnotations();
        
        if (!$faces) {
        $client->close();
        return;
        }
        
        $image = SpatieImage::load($src);
        
        foreach ($faces as $face) {
            
        $vertices = $face->getBoundingPoly()->getVertices();

        $bounds = [];

        foreach ($vertices as $vertex) {
            $bounds[] = [
                $vertex->getX() ?? 0,
                $vertex->getY() ?? 0
            ];
        }

        $w = max(1, $bounds[2][0] - $bounds[0][0]);
        $h = max(1, $bounds[2][1] - $bounds[0][1]);

        $image->watermark(
            public_path('img/face.png'),
            AlignPosition::TopLeft,
            paddingX: $bounds[0][0],
            paddingY: $bounds[0][1],
            width: $w,
            height: $h,
            fit: Fit::Stretch
        );
    }

    $image->save($src);

    $client->close();
}

}
