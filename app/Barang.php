<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /**
     * The roles that belong to the user.
     */
    public function packings()
    {
        return $this->belongsToMany('App\Packing', 'packing_barang', 'barang_id', 'packing_id');
    }

    public function dokumens()
    {
        return $this->belongsToMany('App\Dokumen', 'dokumen_barang', 'barang_id', 'dokumen_id');
    }

    public function aturans()
    {
        return $this->belongsToMany('App\Aturan', 'aturan_barang', 'barang_id', 'aturan_id');
    }

    public function transportasis()
    {
        return $this->belongsToMany('App\Transportasi', 'transportasi_barang', 'barang_id', 'transportasi_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_barang', 'barang_id', 'tag_id');
    }
}
