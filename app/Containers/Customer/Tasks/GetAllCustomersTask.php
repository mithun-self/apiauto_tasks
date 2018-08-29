<?php

namespace App\Containers\Customer\Tasks;

use App\Containers\Customer\Data\Repositories\CustomerRepository;
use App\Ship\Criterias\Eloquent\OrderByFieldCriteria;
use App\Ship\Criterias\Eloquent\ThisMerchantAccountCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllCustomersTask extends Task
{

    protected $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        $this->repository->pushCriteria(new OrderByFieldCriteria('created_at' , 'desc'));
        return $this->repository->paginate();
    }
}
