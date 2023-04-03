@extends("master")

@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Type handicap</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12 d-flex justify-content-between p-0">

                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" name="serach" id="serach" placeholder="Search&hellip;">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card-body p-0 table-data">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px">Id</th>
                                <th style="width: 400px">Type handicap</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include("type handicap.paginate_table")

                        </tbody>
                    </table>

                </div>
            </div>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <div class="under-table">
                <div class="pagination">
                     <!--start-pagination--->
                    {{ $data->links() }}
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- /.control-sidebar -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
function fetch_data(page,query)
{
$.ajax({
 url:"/pagination/fetch_data?page="+page+"&query="+query,
 success:function(data)
 {
  // console.log(data);

  let table = "";
  let pagination = "";
  let html = data;

  let parts = html.split("<!--start-pagination--->");
  table = parts[0];
    pagination = parts[1];


    console.log(pagination)

    $('tbody').html('');
    $('tbody').html(table);
    $('.pagination').html(" ");
    $('.pagination').html(pagination);
}
})
}

$(document).on('keyup', '#serach', function(){
var query = $('#serach').val();
var page = $('#hidden_page').val();
fetch_data(page,query);

});


$(document).on('click', '.pagination a', function(event){
event.preventDefault();
var page = $(this).attr('href').split('page=')[1];
$('#hidden_page').val(page);
var query = $('#serach').val();
console.log(page);
console.log(query);
fetch_data(page,query);

});
});

</script>
@endsection
