<?php

namespace App\Http\Controllers\tambahUserController;

use Illuminate\Routing\Controller;

class TambahUser extends Controller
{


    public function index($id)
    {
        switch ($id) {
            case 'kader':
                $view = 'content.dashboard.addUserComp.kader.index';
                break;
            case 'admin':
                $view = 'content.dashboard.addUserComp.admin.index';
                break;
            case 'bidan':
                $view = 'content.dashboard.addUserComp.bidan.index';
                break;
            case 'kepalaDesa':
                $view = 'content.dashboard.addUserComp.kepalaDesa.index';
                break;
            case 'keluarga':
                $view = 'content.dashboard.addUserComp.keluarga.index';
                break;
            case 'puskesmas':
                $view = 'content.dashboard.addUserComp.puskesmas.index';
                break;
            default:
                abort(404);
        }

        return view($view, ["value" => $id]);
    }
}
