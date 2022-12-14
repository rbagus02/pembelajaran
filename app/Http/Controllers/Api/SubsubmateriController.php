<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Subsubmateri;
use Illuminate\Http\Request;

class SubsubmateriController extends Controller
{
    // public function index(){
    //     $data = Subsubmateri::all();

    //     if($data){
    //         return ApiFormatter::createApi(200, 'Success', $data);
    //     }else{
    //         return ApiFormatter::createApi(400, 'Failed');
    //     }
    // }

    public function show($id)
    {
        $subsubmateri = Subsubmateri::find($id);

        $contents = $subsubmateri->content;
        $contents = [
            [
                'content_type_id' => 2,
                'value' => $subsubmateri->photo1?url($subsubmateri->photo1):null,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf1,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf2,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf3,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf4,
            ],
            [
                'content_type_id' => 2,
                'value' => $subsubmateri->photo2?url($subsubmateri->photo2):null,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf5,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf6,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf7,
            ],
            [
                'content_type_id' => 1,
                'value' => $subsubmateri->paragraf8,
            ],
        ];

        $kontenssm = $subsubmateri->kontenssm->transform(
            function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'contents' => [
                        [
                            'content_type_id' => 2,
                            'value' => $item->photo1?url($item->photo1):null,
                        ],
                        [
                            'content_type_id' => 2,
                            'value' => $item->photo2?url($item->photo2):null,
                        ],
                        [
                            'content_type_id' => 2,
                            'value' => $item->photo3?url($item->photo3):null,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->paragraf1,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->paragraf2,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->paragraf3,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->paragraf4,
                        ],
                        [
                            'content_type_id' => 4,
                            'value' => $item->doc1?url($item->doc1):null,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->juduldoc1,
                        ],
                        [
                            'content_type_id' => 4,
                            'value' => $item->doc2?url($item->doc2):null,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->juduldoc2,
                        ],
                        [
                            'content_type_id' => 4,
                            'value' => $item->doc3?url($item->doc3):null,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->juduldoc3,
                        ],
                        [
                            'content_type_id' => 4,
                            'value' => $item->doc4?url($item->doc4):null,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->juduldoc4,
                        ],
                    ],
                ];
            }
        );

        return response()->json([
            "data" => [
                "id" => $subsubmateri->id,
                'header' => url($subsubmateri->header),
                'title' => $subsubmateri->judul,
                "contents" => $contents,
                "kontenssm" => $kontenssm,
            ]
        ], 200);
    }
}
