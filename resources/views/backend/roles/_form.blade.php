<div class="form-group">
    <label class="col-sm-3 control-label" for="nom"><b>Nom</b></label>
    <div class="col-sm-9">
        <input type="text" placeholder="Exemple: RH, Logistique, maintenance" name="nom" id="nom" class="form-control" value="{{ $role->nom }}">
        {!! $errors->first('nom', '
        <small class="help-block ">:message</small>
        ') !!}
    </div>
</div>