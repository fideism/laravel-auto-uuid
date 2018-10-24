<?php

namespace Fideism\DatabaseUuid;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class DatabaseUuidServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //creating
        //booting
        Event::listen(['eloquent.creating:*'], function ($event, $models) {
            foreach ($models as &$model) {
                $this->makeUuid($model);
            }
        });
    }

    /**
     * @param Model $model
     */
    protected function makeUuid(Model &$model)
    {
        //keyType not uuid
        if (! $model->getKeyType() === 'uuid') {
            return;
        }

        //exists set uuid
        if ($this->isUuid($model->getKey())) {
            return;
        }

        $model->setAttribute($model->getKeyName(), $this->uuid());
    }

    /**
     * @return string
     */
    protected function uuid()
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @param $string
     * @return bool
     */
    protected function isUuid($string)
    {
        return Uuid::isValid($string);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

}
