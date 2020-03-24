<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Product;
use App\Interfaces\CateogryRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CateogryRepositoryInterface
{
    protected Category $model;

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
        return $this->all($columns, $order, $sort);
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
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('name');   
    }

    public function findBySlug($slug)
    {
        return Category::with('products')
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}

