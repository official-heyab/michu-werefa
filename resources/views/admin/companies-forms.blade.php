<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('company.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <select class="form-select" name="category" id="selectCategory">
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="file" required class="form-control" name="image">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" required class="form-control" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc"
                        required placeholder="Enter description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editing <span id="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('company.update')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <select class="form-select" name="category" id="selectCategory">
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="name" placeholder="Name">
                    </div>

                    <div id="imageArea"></div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" required class="form-control" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc"
                        required placeholder="Enter description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <span id="title"></span>?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('company.delete')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="name" placeholder="Name">
                    </div>
                    <div id="imageArea"></div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" disabled class="form-control" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc" disabled></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    //get value links
    $('#editModal, #createModal').on('show.bs.modal', function (event) {
        var categories  = $(event.relatedTarget).data('categories-val');
        var selectCategory="";
        for(var index in categories) {
            selectCategory+= "<option value="+categories[index].id+">"+categories[index].name+"</option>";
        }
        $(this).find('#selectCategory').html(selectCategory);
    });


    //get value links
    $('#editModal, #deleteModal').on('show.bs.modal', function (event) {
        var company = $(event.relatedTarget).data('val');
        var imageURL = $(event.relatedTarget).data('image-val');
        var image="<img width='100' src='"+imageURL+"'/>";

        $(this).find('span#title').html(company.name);
        $(this).find('input[name=id]').val(company.id);
        $(this).find('input[name=name]').val(company.name);
        $(this).find('div#imageArea').html(image);
        $(this).find('input[name=price]').val(company.ticket_price);
        $(this).find('textarea[name=desc]').val(company.desc);
        $(this).find('select#selectCategory option[value='+ company.company_category_id+']').attr('selected','selected');
    });

</script>

