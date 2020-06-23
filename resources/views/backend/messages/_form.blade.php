<div class="form-group">
    <label class="col-sm-3 control-label" for="email"><b>Numéro de téléphone</b></label>
    <div class="col-sm-9">
        <input type="text" placeholder="Numéro de téléphone sans le +224" id="phone" name="phone" class="form-control">
        {!! $errors->first('phone', '
        <small class="help-block ">:message</small>
        ') !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label" for="email"><b>Message</b></label>
    <div class="col-sm-9">
        <textarea name="message" id="" cols="63" rows="10"></textarea>
        {!! $errors->first('message', '
        <small class="help-block ">:message</small>
        ') !!}
    </div>
</div>