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
                <form action="{{route('advertisement.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc"
                        placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="link" placeholder="Enter link">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="currentAd" name="isCurrent"/>
                        <label for="currentAd">Make this the current Ad</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
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
                <form action="{{route('advertisement.update')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc"
                        placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="link" placeholder="Enter link">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="currentAd" name="isCurrent"/>
                        <label for="currentAd">Make this the current Ad</label>
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
                <form action="{{route('advertisement.delete')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" disabled name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" disabled name="desc"
                        placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" disabled name="link" placeholder="Enter link">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="currentAd" disabled name="isCurrent"/>
                        <label for="currentAd">Make this the current Ad</label>
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
    $('#editModal, #deleteModal').on('show.bs.modal', function (event) {
        var ad = $(event.relatedTarget).data('val');

        $(this).find('span#title').html(ad.title);
        $(this).find('input[name=id]').val(ad.id);

        $(this).find('input[name=title]').val(ad.title);
        $(this).find('textarea[name=desc]').val(ad.desc);
        $(this).find('input[name=link]').val(ad.link);
        $(this).find('input[name=isCurrent]').attr("checked", false);
        if(ad.isCurrent)
            $(this).find('input[name=isCurrent]').attr("checked", true);

    });

</script>

