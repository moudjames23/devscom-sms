<?php

namespace App\Helpers;

use App\Client;
use App\Depense;
use App\Produit;
use App\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Personnel;
use App\Sensibilisation;
use App\Salaire;
use App\Document;
use App\TypePersonnel;
use App\Vehicule;
use App\Livraison;
use App\Maintenance;
use App\TypeVehicule;
use App\Marque;
use App\ActivityLog;

class Log
{
    public static function add(Request $request, $subject, Model $model, $data = null)
    {
        $log = new ActivityLog();

        $log->login_id = Auth::user()->last_login->id;

        $log->subject = $subject;
        
        if($data != null)
            $log->data = $data;

        $log->url = $request->fullUrl();
        
        $log->status = explode(' ', $subject)[0];

    	$log->method = $request->getMethod();

    	$log->ip = $request->ip();

        $log->user_id = Auth::user()->id;
        
        if($model instanceof Personnel)
            $log->personnel_id = $model->id;

        if($model instanceof Sensibilisation)
            $log->sensibilisation_id = $model->id;

        if($model instanceof Salaire)
            $log->salaire_id = $model->id;

        if($model instanceof Document)
            $log->document_id = $model->id;

        if($model instanceof TypePersonnel)
            $log->type_personnel_id = $model->id;

        if($model instanceof Vehicule)
            $log->vehicule_id = $model->id;

        if($model instanceof Livraison)
            $log->livraison_id = $model->id;

        if($model instanceof Maintenance)
            $log->maintenance_id = $model->id;

        if($model instanceof TypeVehicule)
            $log->type_vehicule_id = $model->id;

        if($model instanceof Marque)
            $log->marque_id = $model->id;

        if($model instanceof Client)
            $log->client_id = $model->id;

        if($model instanceof Produit)
            $log->produit_id = $model->id;

        if($model instanceof Depense)
            $log->depense_id = $model->id;

        if($model instanceof TypeDocument)
            $log->type_document_id = $model->id;

       $log->save();
    }

    public static function all()
    {

    }
}
