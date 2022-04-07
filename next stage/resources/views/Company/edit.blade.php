<div class="modal fade" id="edit{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('Company.update','test')}}" method="Post"  enctype='multipart/form-data'>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="Name" class="col-form-label">Name:</label>
                        <input type="text" value="{{$value->Name}}" name="Name" class="form-control" id="Name">
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-form-label">Email:</label>
                        <input type="Email" value="{{$value->Email}}" name="Email" class="form-control" id="Email">
                    </div>
                    <div class="form-group">
                        <label for="Website" class="col-form-label">Website:</label>
                        <input type="text" value="{{$value->Website}}" name="Website" class="form-control" id="Website">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Logo </label>
                        <input type="file"  name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <input type="hidden" value="{{$value->id}}" name="id" class="form-control" id="id">


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Save </button>
            </div>
            </form>
        </div>
    </div>
</div>
