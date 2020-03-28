<?php

namespace App\Repository;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
	 * gets all category names in shop index
     * @return
	 */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($order, $sort, $columns);
    }
    /**
     * finds a category by id
     * @param  int $id 
     */
    public function findCategoryById(int $id)
    {
        return $this->findOneOrFail($id);
    }

    public function treeList()
    {
        return $this->model::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('name');   
    }

    public function findBySlug($slug)
    {
        return $this->model::with('products')
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }

    /**
     * Gets the name of the request category
     * @return mixed
     */
    public function getCategoryName()
    {
        if (request()->category) {
            return optional($this->listCategories()->where('slug', request()->category)->first())->name;
        } else {
            return 'All Products';
        }
    }
}

