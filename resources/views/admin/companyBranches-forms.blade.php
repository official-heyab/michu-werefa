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
                <form action="{{route('companyBranch.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc"
                        placeholder="Enter description"></textarea>
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
                <form action="{{route('companyBranch.update')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows=8 class="form-control" name="desc"
                        placeholder="Enter description"></textarea>
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
                <form action="{{route('companyBranch.delete')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="name" placeholder="Name">
                    </div>
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
    $('#editModal, #deleteModal').on('show.bs.modal', function (event) {
        var company = $(event.relatedTarget).data('val');

        $(this).find('span#title').html(company.name);
        $(this).find('input[name=id]').val(company.id);

        $(this).find('input[name=name]').val(company.name);
        $(this).find('input[name=price]').val(company.ticket_price);
        $(this).find('textarea[name=desc]').val(company.desc);
    });

</script>


<!-- Add Receptionists -->
<div class="modal fade" id="addReceptionistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Receptionist for <span id="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('branchReceptionist.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
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

 <!-- Edit Receptionist -->
 <div class="modal fade" id="editReceptionistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Editing <span id="title"></span>  </h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="{{route('branchReceptionist.update')}}" method='post' enctype='multipart/form-data'>
                     @csrf
                     <input type="hidden" name="id">

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
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

<!-- Delete Receptionist -->
<div class="modal fade" id="deleteReceptionistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{route('branchReceptionist.delete')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" disabled class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="phone" placeholder="Phone">
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
    //get value from links
    $('#addReceptionistModal').on('show.bs.modal', function (event) {
        var company = $(event.relatedTarget).data('val');
        $(this).find('span#title').html(company.name);
        $(this).find('input[name=id]').val(company.id);
    });


    $('#editReceptionistModal, #deleteReceptionistModal').on('show.bs.modal', function (event) {
        var company = $(event.relatedTarget).data('company-val');
        var receptionist = $(event.relatedTarget).data('val');

        $(this).find('span#title').html(receptionist.name);
        $(this).find('input[name=id]').val(receptionist.id);

        $(this).find('input[name=name]').val(receptionist.name);
        $(this).find('input[name=email]').val(receptionist.email);
        $(this).find('input[name=phone]').val(receptionist.phone);
    });
</script>


<!-- Queue Modal -->
<div class="modal fade" id="queueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Werefa for <span id="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <form action="{{route('branchReceptionist.nextPerson')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <button type="submit" class="btn btn-success btn-block">Go to Next Person</button>
                </form>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Status</th>
                            <th class='fit'>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Status</th>
                            <th class='fit'>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    //get value from links
    $('#queueModal').on('show.bs.modal', function (event) {
        var tableBody="";
        var company  = $(event.relatedTarget).data('val');
        $(this).find('input[name=id]').val(company.id);
        $(this).find('span#title').html(company.name);


        for (var index in company.queues) {
            var queueDate = new Date(company.queues[index].created_at);

            tableBody +="<tr>";
            tableBody +="<td>"+company.queues[index].user.name+"</td>";
            tableBody +="<td>"+company.queues[index].status+"</td>";
            tableBody +="<td class='fit'>"+queueDate.getHours()+":"+queueDate.getMinutes();
            tableBody +=" "+$.datepicker.formatDate('DD, MM d yy', queueDate)+"</td>";
            tableBody +="</tr>";
        }

        $(this).find('tbody').html(tableBody);
    });


</script>

