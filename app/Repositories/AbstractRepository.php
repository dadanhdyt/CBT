<?php declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * AbstractRepository repository
 * @author dadanhidayat <dadan@gmail.com>
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * Model of repository
     * @var Model $model
     */
    protected Model $model;
    /**
     * untuk mendapatkan semua data yang ada di tabel
     *
     * @return Collection
     */
    public function findAll() : Collection {
        return $this->model->all();
    }
    /**
     * Undocumented function
     *
     * @param string|null $id
     * @return Collection
     */
    public function findOneById(?string $id) : Collection {
        return $this->model->whereId($id)->first();
    }
    /**
     * Undocumented function
     *
     * @param string|null $id
     * @return Collection
     */
    public function findAllById(?string $id) : Collection {
        return $this->model->whereId($id)->get();
    }


}
