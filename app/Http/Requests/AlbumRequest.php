<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Artist;


class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $artist = new Artist();
        return [
            "id" => ["nullable", "exists:albums,id"],
            "album" => ["required", "string", "min:3", "max:255"],
            "artist" => [
                "required",
                "string",
                Rule::in($artist->getNameList()),
            ],
            "year" => ["required", "numeric", "min:1500", "max:".date('Y')],
        ];
    }
}
