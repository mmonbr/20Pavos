<?php namespace App;

use Spatie\MediaLibrary\Media as BaseMedia;

class Media extends BaseMedia
{
    public function moveOrderUp()
    {
        $orderColumn = $this->determineOrderColumnName();

        $swapWithModel = static::limit(1)
            ->orderBy($orderColumn, 'desc')
            ->where($orderColumn, '<', $this->$orderColumn)
            ->where('model_id', '=', $this->model_id)
            ->where('model_type', '=', $this->model_type)
            ->first();

        if (!$swapWithModel) {
            return $this;
        }

        return $this->swapWithModel($swapWithModel);
    }

    public function moveOrderDown()
    {
        $orderColumn = $this->determineOrderColumnName();

        $swapWithModel = static::limit(1)
            ->orderBy($orderColumn)
            ->where($orderColumn, '>', $this->$orderColumn)
            ->where('model_id', '=', $this->model_id)
            ->where('model_type', '=', $this->model_type)
            ->first();

        if (!$swapWithModel) {
            return $this;
        }

        return $this->swapWithModel($swapWithModel);
    }

    public function swapWithModel(self $model)
    {
        $orderColumn = $this->determineOrderColumnName();
        $oldOrderOfOtherModel = $model->$orderColumn;

        $model->$orderColumn = $this->$orderColumn;
        $model->save();

        $this->$orderColumn = $oldOrderOfOtherModel;
        $this->save();

        return $this;
    }
}
