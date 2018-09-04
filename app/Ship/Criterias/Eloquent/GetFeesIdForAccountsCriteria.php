<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class GetFeesIdForAccountsCriteria.
 *
 * @package namespace App\\Criteria;
 */
class GetFeesIdForAccountsCriteria extends Criteria
{
    /**
     * @var
     */
    private $ids;

    private $account_count;
    /**
     * ThisFieldCriteria constructor.
     *
     * @param $field
     */
    public function __construct($ids,$account_count)
    {
        $this->ids = $ids;

        $this->account_count = $account_count;
    }



    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $this->ids;
    }
}
