<div style="padding: 40px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto">
            <form action="Problems.send">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="1">Technical issue</option>
                        <option value="2">Performance issue</option>
                        <option value="3">General improvement</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>