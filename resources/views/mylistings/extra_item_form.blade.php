
<div class="row item-section" item-id="{{ $item->id }}">
    <div class="col-8">
        <label for="str_description_{{ $item->id }}">Description</label>
        <input type="text" class="form-control" name="str_description_{{ $item->id }}" value="{{ $item->str_description }}">
    </div>
    <div class="col-4">
        <div class="buttons">
            <div class="btn btn-outline-danger" onclick="removeItem({{$item->id}})">
                <i class="fas fa-times-circle"></i> Remove
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="height_{{ $item->id }}" min="0" placeholder="height" value="{{ $item->height }}" aria-describedby="length_unit_{{ $item->id }}">
            <div class="input-group-append">
                <select class="input-group-text" name="length_unit_{{ $item->id }}" id="length_unit_{{ $item->id }}">
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="ft">ft</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="width_{{ $item->id }}" min="0"  placeholder="width" value="{{ $item->width }}" aria-describedby="length_unit_{{ $item->id }}">
            <div class="input-group-append">
                <select class="input-group-text" name="length_unit_{{ $item->id }}" id="length_unit_{{ $item->id }}">
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="ft">ft</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="length_{{ $item->id }}" min="0"  placeholder="length" value="{{ $item->length }}" aria-describedby="length_unit_{{ $item->id }}">
            <div class="input-group-append">
                <select class="input-group-text" name="length_unit_{{ $item->id }}" id="length_unit_{{ $item->id }}">
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="ft">ft</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="weight" name="weight_{{ $item->id }}" min="0"  value="{{ $item->weight }}" aria-describedby="weight_unit_{{ $item->id }}">
            <div class="input-group-append">
                <select class="input-group-text" name="weight_unit_{{ $item->id }}" id="weight_unit_{{ $item->id }}">
                    <option value="kg">kg</option>
                    <option value="lb">lb</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    $('#length_unit_{{ $item->id }}').on('change', function() {
        $('[name="length_unit_{{ $item->id }}"]').val($(this).val());
    })
</script>