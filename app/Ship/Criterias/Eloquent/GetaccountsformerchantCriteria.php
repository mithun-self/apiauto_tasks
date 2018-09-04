<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class GetaccountsformerchantCriteria.
 *
 * @package namespace App\\Criteria;
 */
class GetaccountsformerchantCriteria extends Criteria
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $this->repository->findByField('merchant_id',$id);
    }
}
