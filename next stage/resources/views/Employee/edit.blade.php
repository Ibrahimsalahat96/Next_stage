<div class="modal fade" id="edit{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit  employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('Employee.update','test')}}" method="Post"  enctype='multipart/form-data'>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="Name" class="col-form-label">First Name:</label>
                        <input type="text" value="{{$value->First_name}}" name="First_name" class="form-control" id="Name">
                    </div>
                    <div class="form-group">
                        <label for="Name" class="col-form-label">Last Name:</label>
                        <input type="text" value="{{$value->Last_name}}" name="Last_name" class="form-control" id="Name">
                    </div>

                    <div class="form-group">
                        <select class="select" name="Company_id" required>
                            <option selected value="{{$value->company_id}}">{{$value->company->Name}}</option>
                            @foreach ($Company as $v)
                                <option value="{{ $v->id }}">{{ $v->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-form-label">Email:</label>
                        <input type="Email" value="{{ $value->Email }}" name="Email" class="form-control" id="Email">
                    </div>
                    <div class="form-group">
                        <label for="Website" class="col-form-label">Phone:</label>
                        <input type="text" value="{{$value->Phone}}" name="Phone" class="form-control" id="">
                    </div>

                    <input type="text"  value="{{ $value->id }}" name="id" class="form-control" id="Website">



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Save </button>
            </div>
            </form>
        </div>
    </div>
</div>
