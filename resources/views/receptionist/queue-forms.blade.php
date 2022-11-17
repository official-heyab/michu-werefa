
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
                <form action="{{route('receptionist.nextPerson')}}" method='post' enctype='multipart/form-data'>
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
        var branch  = $(event.relatedTarget).data('val');
        $(this).find('input[name=id]').val(branch.id);
        $(this).find('span#title').html(branch.name);

        for (var index in branch.queues) {
            var queueDate = new Date(branch.queues[index].created_at);
            tableBody +="<tr>";
            tableBody +="<td>"+branch.queues[index].user.name+"</td>";
            tableBody +="<td>"+branch.queues[index].status+"</td>";
            tableBody +="<td class='fit'>"+queueDate.getHours()+":"+queueDate.getMinutes();
            tableBody +=" "+$.datepicker.formatDate('DD MM d, yy', queueDate)+"</td>";
            tableBody +="</tr>";
        }

        $(this).find('tbody').html(tableBody);
    });


</script>

