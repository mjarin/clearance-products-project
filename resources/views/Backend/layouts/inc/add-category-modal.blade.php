<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                <form id="form" class="form-horizontal" action="{{ url('add-new-category') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Category Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cate_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="slug">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status" id="status">
                                <option value="1" slected="">Active</option>
                                   <option value="0">Deactive</option>     
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Trending</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="trending" id="trending">
                                <option value="1" slected="">Active</option>
                                   <option value="0">Deactive</option>     
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <textarea name="description" rows="2" class="form-control border "></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Meta Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Meta Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" rows="2" class="form-control" name="meta_description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Meta Keywords</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="meta_keywords">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
