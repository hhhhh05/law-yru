@extends('pages.frontend.home')

{{-- Content --}}
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .modal-footer  > [data-dismiss="modal"]{
	margin-left:5px;
}
</style>
    <input type="text"  class="form-control"  placeholder="ค้นหา..."  id="search" >
            <div class="card-body" id="tag_container">
                   @include('pages.frontend.presult')
            </div>

    <div class="modal fade" id="mainpopup" tabindex="-1" role="dialog" aria-labelledby="mainpopupLabel" aria-hidden="true"  data-close="10" data-open="2" data-href="https://www.anitur.com.tr/popup/test-6-text">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-body">
                    <img src="{{asset('media/logos/new_year.jpg') }}" class="modal-content" id="modal-img-1" alt="">
                </div>

                <div class="modal-footer">
                    <span class="will-close">ปิดอีก : <strong>n</strong> วินาที</span>
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal" >ปิดหน้าต่าง
                    </button>
                </div>

            </div>
        </div>
    </div>

<script>
$(function() {
  var popup = $('#mainpopup');
  var time = $(".will-close strong");
  var closeSeconds = $("#mainpopup").attr("data-close");
  var openSeconds = $("#mainpopup").attr("data-open");
  var dataSrc = $("#mainpopup").attr("data-href");


  setTimeout(function(e) {

    popup.modal('show');
    time.html(closeSeconds);

    setInterval(function(){
      time.html(closeSeconds);
      closeSeconds--;

      if(closeSeconds < 0){
        popup.modal('hide');
      }

    }, 1000)

  }, openSeconds * 1000);

    $.ajax({
    url: dataSrc,
    dataType: "html",
    success: function(data) {
      $(".modal-body").html(data);
    }
  });


});
</script>

@endsection

@section('scripts')


<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            console.log(myurl);
            console.log('page');
            console.log(page);

            getData(page);
        });

        $( "#search" ).keyup(function(){
            var search= $(this).val();

           getData(1,search);
        });


    });

    function getData(page,search=""){
        $.ajax(
        {
            url: '?page=' + page +'&keyword='+search,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }


    $("#Search").on("keyup", function () {
        val = $(this).val().toLowerCase();
        $('tr').each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(val));
        });
    });


</script>



@endsection


