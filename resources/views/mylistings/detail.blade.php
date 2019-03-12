@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="max-width: 1100px; padding: 40px 20px;">
    <h4 style="border-bottom: 1px solid; padding-bottom: 15px;">
        <i class="fas fa-pencil-alt"></i>  Edit Listing
        <div class="buttons">
            <a href="{{ $returnURL }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            <div class="btn btn-primary" onclick="submitForm()"><i class="fas fa-save"></i> Save</div>
        </div>
    </h4>
    <form action="MyListings.save">
    <input type="text" name="id_listing" value="{{ $listing->id_listing }}" hidden>
    <input type="text" name="id" value="{{ $listing->id_listing }}" hidden>
    <div class="row" style="margin: 0 auto; width: 100%;">
        <div class="form-group col-12 col-sm-6">
            <label for="str_title">Title</label>
            <input type="text" required class="form-control" name="str_title" value="{{ $listing->str_title }}">
        </div>
        <div class="form-group col-12 col-sm-6">
            <label for="id_category">Category</label>
            <select name="id_category" id="id_category" class="form-control">
                @foreach( $categories as $category )
                    <option value="{{ $category->id_category }}">{{ $category->str_category }}</option>
                @endforeach
            </select>
            <script>
                $(document).ready( function() {
                    $('#id_category').val('{{ $listing->id_category }}');
                })
            </script>
        </div>
        <div class="form-group col-12">
            <label for="str_description">Description</label>
            <textarea name="str_description" id="str_description" cols="30" rows="5" class="form-control">{{ $listing->str_description }}</textarea>
        </div>
        <div class="form-group col-12">
            <label for="">Images</label>
            <div id="container" class="draganddrop" style="height: 134px; width: 100%; border: 3px dashed gray; line-height: 134px; text-align: center;">
                <div class="inner-holder">
                    <i class="fas fa-cloud-upload-alt"></i>
                    Drag and drop images here or 
                    <a class="btn btn-outline-primary" id="browse" href="javascript:;" title="{{ $translator->get('seleccionar_archivo') }}">Select images </a>
                </div>
                <div class="filelist row" style="padding: 0 !important;margin-top: -50px !important" id="filelist">
                </div>
                <span style="font-size: 18px; line-height: 18px; margin: 0 auto 20px auto;" id="status"></span>
                <a class="btn btn-outline-primary" style="display: none; margin: 0 auto 20px auto;" id="start-upload" href="javascript:;" title="{{ $translator->get('start_upload') }}">Start upload</a>
            </div>
        </div>
        <div class="form-group col-12">
            <label for="">Dimensions</label>
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="height" placeholder="height" value="{{ $listing->height }}" aria-describedby="length_unit">
                        <div class="input-group-append">
                            <select class="input-group-text" name="length_unit" id="length_unit">
                                <option value="cm">cm</option>
                                <option value="m">m</option>
                                <option value="ft">ft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="width" placeholder="width" value="{{ $listing->width }}" aria-describedby="length_unit">
                        <div class="input-group-append">
                            <select class="input-group-text" name="length_unit" id="length_unit">
                                <option value="cm">cm</option>
                                <option value="m">m</option>
                                <option value="ft">ft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="length" placeholder="length" value="{{ $listing->length }}" aria-describedby="length_unit">
                        <div class="input-group-append">
                            <select class="input-group-text" name="length_unit" id="length_unit">
                                <option value="cm">cm</option>
                                <option value="m">m</option>
                                <option value="ft">ft</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-12 col-sm-4">
            <label for="weight">Weight</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="weight" value="{{ $listing->weight }}" aria-describedby="weight_unit">
                <div class="input-group-append">
                    <select class="input-group-text" name="weight_unit" id="weight_unit">
                        <option value="kg">kg</option>
                        <option value="lb">lb</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group col-12 col-sm-4">
            <label for="collection_postcode">Collection postcode</label>
            <input type="text" class="form-control" required name="collection_postcode" value="{{ $listing->collection_postcode }}">
            <input type="text" name="original_cpo" value="{{ $listing->collection_postcode }}" hidden>
        </div>
        <div class="form-group col-12 col-sm-4">
            <label for="delivery_postcode">Delivery postcode</label>
            <input type="text" class="form-control" required name="delivery_postcode" value="{{ $listing->delivery_postcode }}">
            <input type="text" name="original_dpo" value="{{ $listing->delivery_postcode }}" hidden>
        </div>
    </div>
    <button type="submit" id="submit" hidden></button>
    </form>
</div>
<script>
    function submitForm()
    {
        
        $('#submit').click();
    }
    $(document).ready( function() {
    $('[name="length_unit"]').on('change', function() {
        $('[name="length_unit"]').val($(this).val());
    })
    })
</script>
<script>

var files_added = 0;
var uploader = new plupload.Uploader({
    browse_button: 'browse', // this can be an id of a DOM element or the DOM element itself
    runtimes : 'html5',
    drop_element : 'container',
    url: 'Library.upload',
    chunk_size: '200kb',
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
     filters: {
        mime_types : [
            { title : "Images", extensions : "jpg,gif,png,bmp,jpeg" },
            { title : "Videos", extensions : "mp4,mov,wmv" },
            { title : "Audios", extensions : "mp3" }
        ]
     },
    max_retries: 3
});
 
uploader.init();
uploader.bind('Init', function(up, params) {
  if (uploader.features.dragdrop) {
    $('debug').innerHTML = "";
    
    var target = document.getElementById('container');
    
    target.ondragover = function(event) {
      event.dataTransfer.dropEffect = "copy";
      this.className = "dragover";
    };
    
    target.ondragenter = function() {
      this.className = "dragover";
    };
    
    target.ondragleave = function() {
      this.className = "draganddrop";
    };
    
    target.ondrop = function() {
      this.className = "draganddrop";
    };
  }
});
uploader.bind('FilesAdded', function(up, files) {
  uploader.start();
});
uploader.bind('UploadProgress', function(up, file) {
  $('#start-upload').hide();
  $('#status').html('{{ $translator->get("subiendo") }}  '+file.percent+'%');
  if( file.percent === 100 )
  {
    $('[fileid="'+file.id+'"]').remove();
    $('[for="archivo"]').html('{{ $translator->get("archivo") }}');
    $('#status').html('{{ $translator->get("listo") }}');
    $('[file-id="'+file.id+'"]').remove();
    $('#cancelarSubida').hide();
    $('#cambiarArchivo').show();
    done_something = 1;
  }
});
 
uploader.bind('Error', function(up, err) {
  if ( err.code === -601 )
  {
    alert('{{ $translator->get("wrong_type")}}');
  }
});
 
document.getElementById('start-upload').onclick = function() {
};
function deleteFile(file_id)
{
  files_added--;
  if( files_added === 0 ) 
  {
    $('#start-upload').hide();
    $('#status').html('');
  }
  uploader.removeFile(file_id)
  $('#'+file_id).remove();
  $('.inner-holder').show();
  uploader.refresh();
}
    function firstPaso()
    {
        $('#file_section').html('<div style="width: 100%; height: 496px; line-height: 496px; text-align: center;"><img src="archivos/img/loading.gif" style="height: 100px;"/></div>');
        $.ajax({
            type: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "Library.getPaso",
            data: {
                paso: "1",
                id: "{{ $listing->id }}"
            },
            success: function(data)
            {
                $('#file_section').html(data);
            }
        });
    }
    function secondPaso()
    {
        $('#file_section').html('<div style="width: 100%; height: 496px; line-height: 496px; text-align: center;"><img src="archivos/img/loading.gif" style="height: 100px;"/></div>');
        $.ajax({
            type: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "Library.getPaso",
            data: {
                paso: "2",
                id: "{{ $listing->id }}"
            },
            success: function(data)
            {
                $('#file_section').html(data);
            }
        });
    }
</script>