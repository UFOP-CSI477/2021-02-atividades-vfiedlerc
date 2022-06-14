<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('equipment_id', 'Equipamento') }}
            {{ Form::select('equipment_id', $equipamentos, $record->equipment_id, ['class' => 'form-control']); }}
            {!! $errors->first('equipment_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id', 'Responsável') }}
            {{ Form::select('user_id', $users, $record->user_id, ['class' => 'form-control']); }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', $record->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descrição']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('due_date', 'Prazo') }}
            {{ Form::date('due_date', $record->due_date, ['class' => 'form-control' . ($errors->has('due_date') ? ' is-invalid' : ''), 'placeholder' => 'Prazo']) }}
            {!! $errors->first('due_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type', 'Tipo') }}
            {{ Form::select('type', $tiposManutencao, $record->type ?? 1, ['class' => 'form-control']); }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
