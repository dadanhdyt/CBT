<?php declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * SiswaUjianController repository
 * @author dadanhidayat <dadan@gmail.com>
 */
final class SiswaUjianController extends AbstractRepository
{
    /**
     * Table of repository
     * @var Model $model
     */
    protected Model $model;

    public function __construct(){

    }
}
