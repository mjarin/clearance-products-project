<div class="modal fade" id="update-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                <form id="form" class="form-horizontal" action="{{ url('update-category') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" class="form-control" name="cate_id_hidden" id="cate_id_hidden">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Category Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cate_name" id="cate_name">
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
