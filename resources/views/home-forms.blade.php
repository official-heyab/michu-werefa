<!-- Queue History Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Werefa for <span id="title"></span></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
<!--  End Modal -->

<script>
    //get value from links
    $('#historyModal').on('show.bs.modal', function (event) {
        var tableBody="";
        var company  = $(event.relatedTarget).data('val');

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

<!-- Get in line Modal -->
<div class="modal fade" id="getInLineModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"><span id="title"></span></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <form action="{{route('user.getInLine')}}"
            method='post' enctype='multipart/form-data'
            style="margin:0;">
                @csrf
                <input type="hidden" name="company">
                <button type="submit" class="btn btn-success btn-block">Get in line</button>
            </form>

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
<!--  End Modal -->

<script>
    //get value from links
    $('#getInLineModal').on('show.bs.modal', function (event) {
        var modalBody="";
        var company  = $(event.relatedTarget).data('val');
        var peopleWaiting  = $(event.relatedTarget).data('queue-val');
        $(this).find('input[name=company]').val(company.id);
        $(this).find('span#title').html(company.name);


        modalBody +="<img width=100 src='"+company.logo+"'><br><br>";
        modalBody += "<strong>Werefa price: </strong>";
        modalBody += company.ticket_price;
        modalBody += "<br><strong>"+peopleWaiting+" people waiting </strong>";


        $(this).find('.modal-body').html(modalBody);
    });


</script>
