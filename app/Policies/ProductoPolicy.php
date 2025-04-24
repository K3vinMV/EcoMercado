<?php

namespace App\Policies;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function view(User $user, Producto $producto): bool
    {
        return $user->id === $producto->user_id;
    }

    public function update(User $user, Producto $producto): bool
    {
        return $user->id === $producto->user_id;
    }

    public function delete(User $user, Producto $producto): bool
    {
        return $user->id === $producto->user_id;
    }

    public function create(User $user): bool
    {
        return true; // cualquier usuario autenticado puede crear
    }

    public function viewAny(User $user): bool
    {
        return true; // si quieres que vean todos sus productos
    }

}
