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
                <form action="{{route('user.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="roles">Choose role:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="role" id="roles">
                                @foreach($roles as $role)
                                    <option value={{ $role->id }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="email">Enter email:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control" name="email" id="email">
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
                <form action="{{route('user.update')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="roles">Choose role:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="role" id="roles">
                                @foreach($roles as $role)
                                    <option value={{ $role->id }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="email">Enter email:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control" name="email" id="email">
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
                <form action="{{route('user.delete')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="roles">Choose role:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select disabled name="role" id="roles">
                                @foreach($roles as $role)
                                    <option value={{ $role->id }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="email">Enter email:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" disabled class="form-control" name="email" id="email">
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
    //get value from update, delete links
    $('#editModal, #deleteModal').on('show.bs.modal', function (event) {
        var user = $(event.relatedTarget).data('val');
        console.log(user);
        console.log($(this).find('select[name=role]').val());

        $(this).find('span#title').html(user.name);
        $(this).find('input[name=id]').val(user.id);
        $(this).find('select[name=role]').val(user.roles[0].id).change();
        $(this).find('input[name=name]').val(user.name);
        $(this).find('input[name=email]').val(user.email);
        $(this).find('input[name=phone]').val(user.phone);
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Status</th>
                            <th class='fit'>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Company</th>
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
        var user  = $(event.relatedTarget).data('val');
        $(this).find('span#title').html(user.name);

        for (var index in user.queues) {
            var queueDate = new Date(user.queues[index].created_at);

            tableBody +="<tr>";
            tableBody +="<td>"+user.queues[index].company_branch.name+"</td>";
            tableBody +="<td>"+user.queues[index].status+"</td>";
            tableBody +="<td class='fit'>"+queueDate.getHours()+":"+queueDate.getMinutes();
            tableBody +=" "+$.datepicker.formatDate('DD, MM d yy', queueDate)+"</td>";
            tableBody +="</tr>";
        }

        $(this).find('tbody').html(tableBody);
    });


</script>

<!-- Getin line Modal -->
<div class="modal fade" id="getInLineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New werefa for <span id="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.getInLine')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <select class="form-select" name="branch" id="selectCompany">
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Get in line</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    //get in line
    $('#getInLineModal').on('show.bs.modal', function (event) {
        var user = $(event.relatedTarget).data('val');
        var branches  = $(event.relatedTarget).data('branches-val');
        $(this).find('span#title').html(user.name);
        $(this).find('input[name=id]').val(user.id);
        var selectCompany="<option selected value='0'>Open this menu</option>";

        for(var index in branches) {
            selectCompany+= "<option value="+branches[index].id+">"+branches[index].name+"</option>";
        }

        $(this).find('#selectCompany').html(selectCompany);
    });

</script>

<!-- Balance Modal -->
<div class="modal fade" id="balanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Balance Sheet for <span id="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Transaction</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
                <h2>Remaining: <span id="remaining"></span></h2>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    //get value from links
    $('#balanceModal').on('show.bs.modal', function (event) {
        var tableBody="";
        var user  = $(event.relatedTarget).data('val');
        var balanceSheets  = $(event.relatedTarget).data('balance-val');
        var remainingAmount  = $(event.relatedTarget).data('remaining-val');

        $(this).find('input[name=id]').val(user.id);
        $(this).find('span#title').html(user.name);
        $(this).find('span#remaining').html(remainingAmount);



        for (var index in balanceSheets) {
            var transDate = new Date(balanceSheets[index].created_at);
            tableBody +="<tr><td>";
            if(balanceSheets[index].isWithdrawal==1)
                tableBody +="Withdrawed ";
            if(balanceSheets[index].isWithdrawal==0)
                tableBody +="Deposited ";
            tableBody +=balanceSheets[index].amount+"</td>";
            tableBody +="<td>"+transDate.getHours()+":"+transDate.getMinutes();
            tableBody +=" "+$.datepicker.formatDate('DD, MM d yy', transDate);
            tableBody += "</td></tr>";
        }



        $(this).find('tbody').html(tableBody);
    });


</script>

<!-- Top Up Modal -->
<div class="modal fade" id="topUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Top Up <span id="title"></span> Balance</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.topUp')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="refill" placeholder="Amount">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Top Up</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#topUpModal').on('show.bs.modal', function (event) {
        var user = $(event.relatedTarget).data('val');

        $(this).find('span#title').html(user.name);
        $(this).find('input[name=id]').val(user.id);
    });

</script>



