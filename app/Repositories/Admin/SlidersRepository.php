<?php
namespace App\Repositories\Admin;

use App\Models\Slider;

class SlidersRepository
{
    public function getSlider($slider)
    {
        return Slider::query()->findOrFail($slider);
    }

    public function getSliders($perPage)

    {


        return Slider::query()->paginate($perPage);

    }

    public function destroy($slider)
    {
        return Slider::query()->findOrFail($slider)->delete();
    }

    public function store(array $data)
    {
        return Slider::query()->create($data);
    }

    public function update($slider, array $data)
    {
        return Slider::query()->findOrFail($slider)->update($data);
    }
}

